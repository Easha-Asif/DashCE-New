<?php

namespace App\Repositories\User\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Spatie\Permission\Traits\HasRoles;
// use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Classes\Helper;
use App\Http\Traits\ApiResponse;
use App\Http\Resources\Frontend\User\Auth\GetUser;
use App\Http\Resources\Frontend\User\Auth\GetUserProfile;
use File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class AuthRepositories
{
    use ApiResponse, HasRoles;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function userRegister()
    {
        if ($this->request->verified_by == 'email') {
            $type = 'email';
            $token = mt_rand(1000, 9999);
        }

        $imageName = "";
        if (preg_match('/^data:image\/(\w+);base64,/', $this->request->image, $tipp)) {

            $encoded_base64_image = substr($this->request->image, strpos($this->request->image, ',') + 1);
            $tipp = strtolower($tipp[1]);

            $decoded_image = base64_decode($encoded_base64_image);

            $resized_image = Image::make($decoded_image);
            $path = public_path('/uploads/user/');

            if (!file_exists($path)) {
                mkdir($path);
            }

            $imageName = uniqid() . '.' . 'png';

            File::put(public_path('/uploads/user/') . '/' . $imageName, (string) $resized_image->encode());

        }

        $user = User::create([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'image' => 'public/uploads/user/' . $imageName,
            'password' => Hash::make($this->request->password),
            'phone' => $this->request->phone,
            'verified_by' => $type,
            'otp' => $token
        ]);

        $user->assignRole('user');

        // if ($this->request->verified_by == 'email') {

        //     $message = 'The Verification link has been sent to your email';
        //     $data = [
        //         'email' => $user->email,
        //         'name' => $user->name,
        //         'subject' => 'Account verification code'
        //     ];
        //     Helper::sendEmail('accountVerification', ['data' => $user], $data);
        // }

        if ($this->request->verified_by == 'email') {
    // Assuming $user and $user->otp are already defined.
    Mail::send('emails.accountVerification', ['otp' => $user->otp], function (Message $message) use ($user) {
        $message->to($user->email)
            ->subject('Verification Email')
            ->setBody('Your OTP: ' . $user->otp);
    });
}
        // return $this->apiSuccessResponse($message, $user, 201);
        return $this->apiSuccessResponse($message, GetUser::make($user), 201);
    }

    public function userVerifyOtp()
    {
        $validator = Validator::make($this->request->all(), [
            'email' => ['required', 'email'],
            'otp' => ['required', 'numeric', 'digits:4']
        ]);

        if ($validator->fails()) {
            return $this->apiErrorResponse('Invalid Parameters', $validator->errors(), 422);
        }

        $user = User::where(['email' => $this->request->email, 'status' => User::STATUS_ACTIVE])->role('user')->whereNull('deleted_at')->first();
        if (!$user) {
            return $this->apiErrorResponse('User is invalid', [], 401);
        }


        if ($this->request->redirectToPassword) {
            if ($user->otp == null) {
                return $this->apiErrorResponse('User is already verified', [], 401);
            }
            if ($user->otp != $this->request->otp) {
                return $this->apiErrorResponse('Please enter valid otp', [], 401);
            }

            $user->update(
                [
                    'otp' => null
                ]
            );

            if ($user->verified_by = 'email') {
                $data = [
                    'email' => $user->email,
                    'name' => $user->name,
                    'subject' => 'Account recovery code',
                ];

                Helper::sendEmail('accountVerification', ['data' => $user], $data);
            }
            return $this->apiSuccessResponse('Successfully Verified User', ['user' => GetUser::make($user)], 200);
        }

        if ($user->verified_by == 'email' && $user->email_verified_at != '' && $user->otp == '') {
            return $this->apiErrorResponse('User is already verified', [], 401);
        }

        if ($this->request->otp != $user->otp) {
            return $this->apiErrorResponse('Please enter valid OTP!', [], 401);
        }

        $user->update(
            [
                'email_verified_at' => date('Y-m-d H:i:s'),
                'otp' => null
            ]
        );

        if (!Auth::loginUsingId($user->id)) {
            return $this->apiErrorResponse("Something wen't wrong");
        }

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($this->request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        if ($this->request->device_type && $this->request->device_token) {
            $user->update(
                [
                    'device_type' => $this->request->device_type,
                    'device_token' => $this->request->device_token,
                ]
            );
        }

        $user->token = 'Bearer ' . $tokenResult->accessToken;
        return $this->apiSuccessResponse('Successfully logged in', $user, 200);
    }

    public function userLogin()
    {
        $validator = Validator::make($this->request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:6', 'max:16'],
            // 'device_type' => [Rule::in(['android', 'ios'])],
            // 'device_token' => ['string', 'max:255']
        ]);

        if ($validator->fails()) {
            return $this->apiErrorResponse('Invalid Parameters', $validator->errors(), 422);
        }

        $userCheck = User::where('email', $this->request->email)->where('status', User::STATUS_ACTIVE)->whereNull('deleted_at')->first();

        if (!$userCheck) {
            return $this->apiErrorResponse("Invalid email or Password", [], 401);
        }

        if (!$userCheck->hasRole('user')) {
            return $this->apiErrorResponse("Invalid email or Password", [], 401);
        }

        $attempt = Auth::attempt(['email' => $this->request->email, 'password' => $this->request->password, 'status' => User::STATUS_ACTIVE]);

        if (!$attempt) {
            return $this->apiErrorResponse("Invalid email or Password", [], 401);
        }

        $user = Auth::user();

        if ($user->email_verified_at == "") {
            $user->update(
                [
                    'otp' => mt_rand(1000, 9999)
                ]
            );
            $data = [
                'email' => $user->email,
                'name' => $user->name,
                'subject' => 'Account verification code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $user], $data);
            return $this->apiErrorResponse('User is not verified', ['user' => GetUser::make($user)], 401);
        }

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($this->request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        if ($this->request->device_type && $this->request->device_token) {
            $user->update(
                [
                    'device_type' => $this->request->device_type,
                    'device_token' => $this->request->device_token,
                ]
            );
        }

        $user->token = "Bearer " . $tokenResult->accessToken;
        $user->roles = $user->roles ?? [];
        return $this->apiSuccessResponse('Successfully logged in', ['user' => GetUser::make($user)], 200);
    }

    public function userResendOtp()
    {
        $user = User::where(['email' => $this->request->email, 'status' => User::STATUS_ACTIVE])->role('user')->whereNull('deleted_at')->first();

        if (!$user) {
            return $this->apiErrorResponse('Invalid email address', [], 401);
        }

        if ($user->otp == '') {
            return $this->apiErrorResponse('User is already verified', [], 200);
        }

        if ($user->verified_by == 'email') {
            $data = [
                'email' => $user->email,
                'name' => $user->name,
                'subject' => 'Resend Account verification code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $user], $data);
        }

        return $this->apiSuccessResponse('The Otp Code has been sent to your registered email', ['user' => GetUser::make($user)], 200);
    }

    public function userForgotPassword()
    {
        $user = User::where(['email' => $this->request->email, 'status' => User::STATUS_ACTIVE])->role('user')->whereNull('deleted_at')->first();

        if (!$user) {
            return $this->apiErrorResponse('Invalid Email Address', [], 401);
        }

        $user->update(
            [
                'otp' => mt_rand(1111, 9999),
                'verified_by' => 'email'
            ]
        );

        $data = [
            'email' => $user->email,
            'name' => $user->name,
            'subject' => 'Account recovery code',
        ];

        Helper::sendEmail('accountVerification', ['data' => $user], $data);
        return $this->apiSuccessResponse('We have sent you a otp on your registered email', ['user' => GetUser::make($user)], 200);
    }

    public function userResetPassword()
    {
        $validator = Validator::make($this->request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'max:16', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return $this->apiErrorResponse('Invalid Parameters', $validator->errors(), 422);
        }
        $user = User::where(['email' => $this->request->email, 'status' => User::STATUS_ACTIVE])->role('user')->whereNull('deleted_at')->first();

        if (!$user) {
            return $this->apiErrorResponse('Invalid User', [], 401);
        }

        $user->update([
            'password' => Hash::make($this->request->password)
        ]);
        return $this->apiSuccessResponse("Your password has been reset successfully");
    }

    public function userUpdatePassword()
    {
        $validator = Validator::make($this->request->all(), [
            'password' => ['required', 'string', 'min:8', 'max:16', 'confirmed']
        ]);

        if ($validator->fails()) {
            return $this->apiErrorResponse('Invalid Parameters', $validator->errors(), 422);
        }

        $user = Auth::user();

        $user->update([
            'password' => Hash::make($this->request->password)
        ]);
        return $this->apiSuccessResponse('Your password has been updated successfully', ['user' => GetUser::make($user)], 200);
    }

    public function userLogout()
    {
        try {
            $user = $this->request->user();
            $user->update([
                'device_type' => null,
                'device_token' => null,
            ]);
            $this->request->user()->token()->revoke();
                return $this->apiSuccessResponse('Successfully logged out', [], 200);
        } catch (\Exception $exception) {
            if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
                return ('The session is already logged out');
            }
        }
    }

    public function userGetProfile()
    {
        $user = User::find(Auth::id());
        if (!$user) {
            return $this->apiErrorResponse("Unauthorized", [], 401);
        }
        // $user->load(['interests', 'videos']);
        return $this->apiSuccessResponse('success', ['user' => GetUserProfile::make($user)], 200);
    }

    public function userUpdateProfile()
    {
        $user = Auth::user();
        $user->update([
            'name' => $this->request->name,
            'phone' => $this->request->phone
        ]);

        if ($this->request->image) {
            $imageName = "";
            if (preg_match('/^data:image\/(\w+);base64,/', $this->request->image, $tipp)) {

                $encoded_base64_image = substr($this->request->image, strpos($this->request->image, ',') + 1);
                $tipp = strtolower($tipp[1]);

                $decoded_image = base64_decode($encoded_base64_image);

                $resized_image = Image::make($decoded_image);
                $path = public_path('/uploads/user/');

                if (!file_exists($path)) {
                    mkdir($path);
                }

                $imageName = uniqid() . '.' . 'png';

                File::put(public_path('/uploads/user/') . '/' . $imageName, (string) $resized_image->encode());

                $user->update([
                    'image' => 'public/uploads/user/' . $imageName
                ]);
            }
        }
        // $user->load('interests');

        return $this->apiSuccessResponse('Your profile has been updated successfully');
    }

    public function userDeleteAccount()
    {
        $validator = Validator::make($this->request->all(), [
            'password' => 'required|string|min:6|max:16|confirmed'
        ]);

        if ($validator->fails()) {
            return $this->apiErrorResponse('Invalid Parameters', $validator->errors());
        }

        $user = User::find(Auth::user()->id);
        if (! Hash::check($this->request->password, $user->password)) {
            return 'Current password doesn,t match';
        }
        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'delete Successfully',
            'data' => []
        ]);
    }

    public function userDeviceToken()
    {
        $validator = Validator::make($this->request->all(), [
            'device_token' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiValidatorErrorResponse('Invalid Parameters', $validator->errors());
        }

        $user = User::find(Auth::user()->id);

        $user->update([
            'device_token' => $this->request->device_token,
        ]);

        if ($user) {
            return $this->apiSuccessResponse('Device Token Saved Successfully');
        }
    }

    public function userGoogleAuth()
    {
        $finduser = User::where('social_token', $this->request->social_token)->role('user')->first();
       
        if($finduser) {
            if($this->request->email) {
                $finduser->email = $this->request->email;
                $finduser->save();
            }
            Auth::login($finduser);
            // return $this->apiSuccessMessageResponse('You have sign in successfully', $finduser);
        } else {
            $finduser = "";
            if($this->request->email){
                $finduser = User::where('email', $this->request->email)->first();
            }
           
            if($finduser){
                $finduser->social_token = $this->request->social_token;
                $finduser->social_provider = 'google';
                $finduser->save();
                Auth::login($finduser);
            } else {
                $finduser = new User();
                $finduser->name = $this->request->name;
                $finduser->email = $this->request->email;
                $finduser->social_token = $this->request->social_token;
                $finduser->email_verified_at = date('Y-m-d H:i:s');                
                $finduser->verified_by  = 'google';                
                $finduser->password = bcrypt('googlePassword');
                $finduser->social_provider = 'google';
                $finduser->email_verified_at = date('Y-m-d H:i:s');
                // $this->assignRole($this->request->role);
                $finduser->assignRole('user');
                $finduser->save();
                Auth::login($finduser);    
            }
        }

        if (!Auth::guard('frontend')->loginUsingId($finduser->id))
        {
            return 'Something wen\'t wrong';
        }

        if (Auth::guard('frontend')->user())
        {
            $user = Auth::guard('frontend')->user();
        }

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($this->request->remember_me)
        {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        $device_type = $this->request->has('device_type') ? $this->request->device_type : '';
        $device_token = $this->request->has('device_token') ? $this->request->device_token : '';

        if ($device_token && $device_type)
        {
            $user->device_type   = $device_type;
            $user->device_token  = $device_token;

            $user->save();
        }

        $user->token = 'Bearer ' . $tokenResult->accessToken;
        $user->roles = $user->roles ?? [];
    
        return $this->apiSuccessResponse('success', ['user' => GetUser::make($user)], 200);
    }

    public function userFacebookAuth()
    {
        $finduser = User::where('social_token', $this->request->social_token)->role('user')->first();
       
        if($finduser) {
            if($this->request->email) {
                $finduser->email = $this->request->email;
                $finduser->save();
            }
              Auth::login($finduser);
              // return $this->apiSuccessMessageResponse('You have sign in successfully', $finduser);
        } else {
            $finduser = "";
            if($this->request->email){
                $finduser = User::where('email', $this->request->email)->first();
            }
           
            if($finduser){
                $finduser->social_token = $this->request->social_token;
                $finduser->social_provider = 'facebook';
                $finduser->save();
                Auth::login($finduser);
            } else {
                $finduser = new User();
                $finduser->name = $this->request->name;
                $finduser->email = $this->request->email;
                $finduser->social_token = $this->request->social_token;
                $finduser->email_verified_at = date('Y-m-d H:i:s');                
                $finduser->verified_by  = 'facebook';                
                $finduser->password = bcrypt('facebookPassword');
                $finduser->social_provider = 'facebook';
                $finduser->email_verified_at = date('Y-m-d H:i:s');
                // $this->assignRole($this->request->role);
                $finduser->assignRole('user'); 
                $finduser->save();
                Auth::login($finduser);
            }          
           
        }

        if (!Auth::guard('frontend')->loginUsingId($finduser->id))
        {
            return 'Something wen\'t wrong';
        }

        if (Auth::guard('frontend')->user())
        {
            $user = Auth::guard('frontend')->user();
        }

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($this->request->remember_me)
        {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        $device_type = $this->request->has('device_type') ? $this->request->device_type : '';
        $device_token = $this->request->has('device_token') ? $this->request->device_token : '';

        if ($device_token && $device_type)
        {
            $user->device_type   = $device_type;
            $user->device_token  = $device_token;

            $user->save();
        }

        $user->token = 'Bearer ' . $tokenResult->accessToken;
        $user->roles = $user->roles ?? [];
       
        return $this->apiSuccessResponse('success', ['user' => GetUser::make($user)], 200);
    }

    public function userAppleAuth()
    { 
        $finduser = User::where('social_token', $this->request->social_token)->role('user')->first();
       
        if($finduser) {
            if($request->email) {
                $finduser->email = $request->email;
                $finduser->save();
            }
              Auth::login($finduser);
              // return $this->apiSuccessMessageResponse('You have sign in successfully', $finduser);
        } else {
            $finduser = "";
            if($this->request->email){
                $finduser = User::where('email', $this->request->email)->first();
            }
           
            if($finduser){
                $finduser->social_token = $this->request->social_token;
                $finduser->social_provider = 'facebook';
                $finduser->save();
                Auth::login($finduser);
            } else {
                $finduser = new User();
                $finduser->name = $this->request->name;
                $finduser->email = $this->request->email;
                $finduser->social_token = $this->request->social_token;
                $finduser->email_verified_at = date('Y-m-d H:i:s');                
                $finduser->verified_by  = 'Apple';                
                $finduser->password = bcrypt('applePassword');
                $finduser->social_provider = 'Apple';
                $finduser->email_verified_at = date('Y-m-d H:i:s');
                // $this->assignRole($this->request->role);
                $finduser->assignRole('user');
                $finduser->save();
                Auth::login($finduser);    
            }          
           
        }

        if (!Auth::guard('frontend')->loginUsingId($finduser->id))
        {
            return 'Something wen\'t wrong';
        }

        if (Auth::guard('frontend')->user())
        {
            $user = Auth::guard('frontend')->user();
        }

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($this->request->remember_me)
        {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        $device_type = $this->request->has('device_type') ? $this->request->device_type : '';
        $device_token = $this->request->has('device_token') ? $this->request->device_token : '';

        if ($device_token && $device_type)
        {
            $user->device_type   = $device_type;
            $user->device_token  = $device_token;

            $user->save();
        }

        $user->token = 'Bearer ' . $tokenResult->accessToken;
        $user->roles = $user->roles ?? [];
       
        return $user;
       
    }
}

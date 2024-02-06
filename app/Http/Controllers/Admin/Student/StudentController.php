<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\License;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Hash;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::role('student')->with('license')->orderBy('id', 'desc')->get();
        return view('admin.students.index',compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', 'student')->pluck('name','name')->all();
        $licenses = License::where('status', '0')->get();
        return view('admin.students.create',compact('roles', 'licenses'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $input['parent_id'] = Auth::user()->id;
        $input['date'] = Carbon::now();
        $input['verified_by'] = 'email';
        $input['email_verified_at'] = Carbon::now();

        $input['referral_code'] = Str::random(8);
        $input['referral_url'] = route('register', ['referral_code' => $input['referral_code']]);

        if ($input['referring_url']) {
            $referredUser = User::where('referral_url', $input['referring_url'])->first();
            if ($referredUser) {
                // Increment the points of the referred user
                $referredUser->dash_pass += 10;
                $referredUser->save();
            }
        }
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        Toastr::success('Student created successfully.', 'Success');
        return redirect()->route('students.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('name', 'student')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $licenses = License::where('status', '0')->get();
    
        return view('admin.students.edit',compact('user','roles','userRole', 'licenses'));
    }

    public function view($id)
    {
        $user = User::find($id);
        $users = User::Role('user')->orderBy('id', 'desc')->get();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        $referralUrl = $user->referral_url ?? '';
        $referralCount = User::where('referring_url', $referralUrl)->count();
    
        return view('admin.students.view',compact('user','roles','userRole', 'users', 'referralCount'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $user->password;
        }
        
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        Toastr::success('Student updated successfully.', 'Success');
        return redirect()->route('students.index');
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.students.userProfile',compact('user'));
    }

    public function userUpdateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->input('name');

        $image = $request->file('image');

        $fileName = null;

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/users/student');
            $image_full_path = 'uploads/users/student/'.$name;
            $image->move($destinationPath, $name);

            $user->image = $image_full_path;
        }

        $user->save();

        Toastr::success('Student Updated Successfully.', 'Success');
        return redirect()->back();
    }

    public function changePassword()
    {
        return view('admin.students.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string|min:6|max:16',
            'password' => 'required|string|min:6|max:16|same:confirm-password',
        ]);
    
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->withErrors([
                'old_password' => 'Old password is not correct'
            ]);
        }

        auth()->user()->update([
           'password'=> bcrypt($request->password)
        ]);

        Toastr::success('Password has been changed.', 'Success');
        return redirect()->back();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Toastr::success('Student deleted successfully.', 'Success');
        return redirect()->route('students.index');
    }

    public function status($id)
    {
        $sliders = User::find($id);
        $newStatus = ($sliders->status == '0') ? '1' : '0';
        $sliders->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->route('students.index');
    }
}

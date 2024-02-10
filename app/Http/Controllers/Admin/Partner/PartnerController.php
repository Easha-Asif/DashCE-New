<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\License;
use App\Models\PromoCode;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Hash;
use Auth;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::role('partner')->orderBy('id', 'desc')->get();

        $referralUrlcount = $user->referral_url ?? '0';
        $referralUrlcounts = $referralUrlcount;

        return view('admin.partners.index',compact('users', 'referralUrlcounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', 'partner')->pluck('name','name')->all();
        return view('admin.partners.create',compact('roles'));
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

        $input['date'] = Carbon::now();
        $input['verified_by'] = 'email';
        $input['email_verified_at'] = Carbon::now();

        $input['referral_code'] = Str::random(8);
       

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        Toastr::success('Partner created successfully.', 'Success');
        return redirect()->route('partners.index');
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
        $roles = Role::where('name', 'partner')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.partners.edit',compact('user','roles','userRole'));
    }

    public function view($id)
    {
        $user = User::find($id);
        $users = User::Role('user')->orderBy('id', 'desc')->get();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        $referralUrl = $user->referral_url ?? '';

        $referralUrlcount = $user->referral_url ?? '0';
        $referralUrlcounts = $referralUrlcount;
        $referralCount = User::where('referring_url', $referralUrl)->count();

        $promocodes = PromoCode::where('user_id', $id)->orderBy('id', 'desc')->get();

        $license = License::with('partnerid')->where('partner_id', $id)->orderBy('id', 'desc')->first();
        $students = User::role('student')->where('parent_id', $id)->orderBy('id', 'desc')->get();
        $studentcounts = User::role('student')->where('parent_id', $id)->orderBy('id', 'desc')->count();

        return view('admin.partners.view',compact('user','roles','userRole', 'users', 'license', 'referralUrlcounts', 'referralCount', 'students', 'studentcounts', 'promocodes'));
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

        Toastr::success('Partner updated successfully.', 'Success');
        return redirect()->route('partners.index');
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.partners.userProfile',compact('user'));
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
            $destinationPath = public_path('/uploads/users/partner');
            $image_full_path = 'uploads/users/partner/'.$name;
            $image->move($destinationPath, $name);

            $user->image = $image_full_path;
        }

        $user->save();

        Toastr::success('Partner Updated Successfully.', 'Success');
        return redirect()->back();
    }

    public function changePassword()
    {
        return view('admin.partners.changePassword');
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
        Toastr::success('Partner deleted successfully.', 'Success');
        return redirect()->route('partners.index');
    }
}

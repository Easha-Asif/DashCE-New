<?php

namespace App\Http\Controllers\Admin\License;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\License;
use App\Models\User;
use Carbon\Carbon;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = License::orderBy('id', 'desc')->get();
        return view('admin.licenses.index', compact('licenses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brokerages = User::all();
        return view('admin.licenses.create', compact('brokerages'));
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
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['date'] = Carbon::now();

        License::create($input);

        Toastr::success('License created successfully.', 'Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $license = License::find($id);
        $brokerages = User::all();
        return view('admin.licenses.edit', compact('license', 'brokerages'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $license
     * @param  \App\License  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $license = License::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $license->update($input);

        Toastr::success('License updated successfully', 'Success');
        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\License  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $license = License::find($id);
        $license->delete();

        Toastr::success('License deleted successfully', 'Success');
        return redirect()->route('users.index');
    }

    public function status($id)
    {
        $licenses = License::find($id);
        $newStatus = ($licenses->status == '0') ? '1' : '0';
        $licenses->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->route('users.index');
    }
}

<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Module;
use App\Models\User;
use Carbon\Carbon;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::orderBy('id', 'desc')->get();
        return view('admin.modules.index', compact('modules'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brokerages = User::all();
        return view('admin.modules.create', compact('brokerages'));
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
        $input['course_id'] = $request->input('course_id');

        Module::create($input);

        Toastr::success('Module created successfully.', 'Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::find($id);
        $brokerages = User::all();
        return view('admin.modules.edit', compact('module', 'brokerages'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $module
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = Module::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $module->update($input);

        Toastr::success('Module updated successfully', 'Success');
        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();

        Toastr::success('Module deleted successfully', 'Success');
        return redirect()->back();
    }

    public function status($id)
    {
        $modules = Module::find($id);
        $newStatus = ($modules->status == '0') ? '1' : '0';
        $modules->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->back();
    }
}

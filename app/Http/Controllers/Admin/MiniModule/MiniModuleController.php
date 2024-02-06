<?php

namespace App\Http\Controllers\Admin\MiniModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Module;
use App\Models\MiniModule;
use App\Models\User;
use Carbon\Carbon;

class MiniModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minimodules = MiniModule::orderBy('id', 'desc')->get();
        return view('admin.minimodules.index', compact('minimodules'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module = Module::all();
        return view('admin.minimodule.create', compact('module'));
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
            'module_id' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['course_id'] = $request->input('course_id');

        MiniModule::create($input);

        Toastr::success('Mini Module created successfully.', 'Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $miniminimodule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $minimodule = MiniModule::find($id);
        $modules = Module::all();
        return view('admin.minimodules.edit', compact('modules', 'minimodule'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $miniminimodule
     * @param  \App\Module  $miniminimodule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $miniminimodule = MiniModule::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $miniminimodule->update($input);

        Toastr::success('Mini Module updated successfully', 'Success');
        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $miniminimodule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $miniminimodule = MiniModule::find($id);
        $miniminimodule->delete();

        Toastr::success('Mini Module deleted successfully', 'Success');
        return redirect()->back();
    }

    public function status($id)
    {
        $minimodule = MiniModule::find($id);
        $newStatus = ($minimodule->status == '0') ? '1' : '0';
        $minimodule->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->back();
    }
}

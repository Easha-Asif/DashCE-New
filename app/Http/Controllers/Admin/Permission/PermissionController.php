<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Validation\Rule;
use Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->get();
        return view('admin.permissions.index',compact('permissions'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
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
            'name' => 'required|unique:permissions,name',
        ]);

        $input = $request->all();

        $permission = Permission::create($input);

        Toastr::success('Permission created successfully.', 'Success');
       	return redirect()->route('permissions.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('admin.permissions.edit',compact('permission'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $permission = Permission::find($id);

        $this->validate($request, [
            'name' => ['required', Rule::unique('permissions', 'name')->ignore($user->id)],
        ]);

        $input = $request->all();
    
        $permission->update($input);

        Toastr::success('Permission updated successfully', 'Success');
       	return redirect()->route('permissions.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        Toastr::success('Permission deleted successfully', 'Success');
       	return redirect()->route('permissions.index');
    }
}

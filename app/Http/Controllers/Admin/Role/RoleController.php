<?php
    
namespace App\Http\Controllers\Admin\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use DB;
use Auth;
    
class RoleController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'desc')->get();
        return view('admin.roles.index',compact('roles'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        // Extract resource names and actions from all permissions
        $resourceActions = $permissions->map(function ($permission) {
            $parts = explode('-', $permission->name);
            $action = array_pop($parts); // Get the last part as action
            $resource = implode('-', $parts); // Join the remaining parts as resource

            return compact('resource', 'action');
        })->unique('resource')->toArray();

        // Separate unique resource names and actions
        $resources = array_unique(array_column($resourceActions, 'resource'));
        $actions = ['list', 'create', 'edit', 'delete'];

        return view('admin.roles.create', compact('permissions', 'resources', 'actions'));
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
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        Toastr::success('Role created successfully.', 'Success');
       	return redirect()->route('roles.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        // Extract resource names and actions from all permissions
        $resourceActions = $permissions->map(function ($permission) {
            $parts = explode('-', $permission->name);
            $action = array_pop($parts); // Get the last part as action
            $resource = implode('-', $parts); // Join the remaining parts as resource

            return compact('resource', 'action');
        })->unique('resource')->toArray();

        // Separate unique resource names and actions
        $resources = array_unique(array_column($resourceActions, 'resource'));
        $actions = ['list', 'create', 'edit', 'delete'];

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions', 'resources', 'actions'));
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
        $user = Auth::user();
        $this->validate($request, [
            'name' => ['required', Rule::unique('roles', 'name')->ignore($user->id)],
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));

        Toastr::success('Role updated successfully.', 'Success');
       	return redirect()->route('roles.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        Toastr::success('Role deleted successfully.', 'Success');
       	return redirect()->route('roles.index');
    }
}
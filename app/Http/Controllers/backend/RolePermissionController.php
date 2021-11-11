<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function RolePermissionView(){

        abort_if(Gate::denies('roles.view'), 403);
// 
        $data['roles'] = Role::all();
        $data['permissions'] = Permission::all();

        return view('backend.settings.view_role-permission', $data);

    }

    /*======================================
                    ROLES
    ========================================*/    

    public function RoleStore(Request $request){

        $validatedData = $request->validate([

            'name' => 'required|unique:roles'

        ]);

        $role = Role::create(['name' => $request->name]);

        $role->permissions()->sync($request->permissions);

        $notification = array(

            'message' => 'Role Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('roles-permissions.view')->with($notification);

    }

    public function RoleUpdate(Request $request, $id){

        $data = Role::find($id);

        $data->name = $request->name;
        
        $data->permissions()->sync($request->permissions);

        $data->save();

        $notification = array(

            'message' => 'Role Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('roles-permissions.view')->with($notification);

    }

    public function RoleDelete($id){

        abort_if(Gate::denies('roles.delete'), 403);


        $role = Role::find($id);
       
        $role->delete();

        $notification = array(

            'message' => 'Role Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('roles-permissions.view')->with($notification);       

    }

    /*======================================
                    PERMISSIONS
    ========================================*/

    public function PermissionStore(Request $request){

        $validatedData = $request->validate([

            'name' => 'required|unique:permissions',
            'description' => 'required',

        ]);

        Permission::create(['name' => $request->name,
                            'description' => $request->description]);

        $notification = array(

            'message' => 'Permission Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('roles-permissions.view')->with($notification);

    }

    public function PermissionUpdate(Request $request, $id){

        $data = Permission::find($id);

        $data->name = $request->name;
        $data->description = $request->description;

        $data->save();

        $notification = array(

            'message' => 'Permission Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('roles-permissions.view')->with($notification);

    }

    public function PermissionDelete($id){

        $role = Permission::find($id);
       
        $role->delete();

        $notification = array(

            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('roles-permissions.view')->with($notification);       

    }
}

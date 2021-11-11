<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function UserView(){

        abort_if(Gate::denies('users.view'), 403);

        // $allData = User::all();

        // $data['allData'] = User::where('usertype', 'Administrador')->get();

        $data['allData'] = User::all();

        return view('backend.user.view_user', $data);

    }

    public function UserAdd(){

        abort_if(Gate::denies('users.add'), 403);

        $data['roles'] = Role::all();

        return view('backend.user.add_user', $data);

    }

    public function UserStore(Request $request){

        $validatedData = $request->validate([

            'email' => 'required|unique:users',
            'name' => 'required',

        ]);

        $data = new User();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        $roles = $request->role;
        $data->syncRoles($roles);

        $data->save();    

        $notification = array(

            'message' => 'User Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('user.view')->with($notification);

    }

    public function UserEdit($id){

        abort_if(Gate::denies('users.edit'), 403);        

        $editData = User::find($id);
        $roles = Role::all();
        return view('backend.user.edit_user',compact('editData', 'roles'));

    }

    public function UserUpdate(Request $request, $id){

        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;

        $roles = $request->role;
        $data->syncRoles($roles);

        $data->save();

        $notification = array(

            'message' => 'User Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('user.view')->with($notification);

    }

    public function UserDelete($id){
        
        abort_if(Gate::denies('users.delete'), 403);

        $user = User::find($id);

        if (Auth()->user()->id == $user->id){

            $notification = array(

                'message' => 'It is not possible to delete your user while you are logged in.',
                'alert-type' => 'info',

            );

            return redirect()->route('user.view')->with($notification);

        }else{

            $user->delete();

            $notification = array(

                'message' => 'User Deleted Successfully',
                'alert-type' => 'info',

            );

            return redirect()->route('user.view')->with($notification);

        }

    }

    
}

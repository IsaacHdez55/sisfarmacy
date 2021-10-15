<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){

        // $allData = User::all();

        // $data['allData'] = User::where('usertype', 'Administrador')->get();

        $data['allData'] = User::all();

        return view('backend.user.view_user', $data);

    }

    public function UserAdd(){

        return view('backend.user.add_user');

    }

    public function UserStore(Request $request){

        $validatedData = $request->validate([

            'email' => 'required|unique:users',
            'name' => 'required',

        ]);

        $data = new User();

        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        $data->save();

        $notification = array(

            'message' => 'User Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('user.view')->with($notification);

    }

    public function UserEdit($id){

        $editData = User::find($id);
        return view('backend.user.edit_user',compact('editData'));

    }

    public function UserUpdate(Request $request, $id){

        $data = User::find($id);

        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;

        $data->save();

        $notification = array(

            'message' => 'User Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('user.view')->with($notification);

    }

    public function UserDelete($id){

        $user = User::find($id);
        $user->delete();

        $notification = array(

            'message' => 'User Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('user.view')->with($notification);

    }

    public function ChangeStatus($id){

        $user = User::find($id);

        if ($user->status == '1') {
            
            $user->status = '0';

            $user->save();

            return redirect()->back();

        }else{

            $user->status = '1';

            $user->save();

            return redirect()->back();
        }

    }
}

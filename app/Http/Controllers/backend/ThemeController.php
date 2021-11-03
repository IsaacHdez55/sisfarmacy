<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function ThemeView(){

        $data['allData'] = Theme::all();

        return view('backend.settings.view_theme', $data);

    }

    public function ThemeUpdate(Request $request, $id){

        $data = Theme::find($id);

        $data->website_name = $request->website_name;

        if ($request->file('light_logo')) {
            
            $file = $request->file('light_logo');
            @unlink(public_path('upload/settings_image/'.$data->light_logo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/settings_image'),$filename);
            $data['light_logo'] = $filename;

        }

        if ($request->file('favicon')) {
            
            $file = $request->file('favicon');
            @unlink(public_path('upload/settings_image/'.$data->favicon));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/settings_image'),$filename);
            $data['favicon'] = $filename;

        }

        $data->save();

        $notification = array(

            'message' => 'Theme Updated Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('theme.view')->with($notification);

    }

}

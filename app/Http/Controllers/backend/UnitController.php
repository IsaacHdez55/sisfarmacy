<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function UnitView(){

        $data['allData'] = Unit::all();

        return view('backend.unit.view_unit', $data);

    }

    public function UnitAdd(){

        return view('backend.unit.add_unit');

    }

    public function UnitStore(Request $request){

        $validatedData = $request->validate([

            'units_name' => 'required|unique:units',

        ]);

        $data = new Unit();

        $data->units_name = $request->units_name;
        $data->units_short_name = $request->units_short_name;

        $data->save();

        $notification = array(

            'message' => 'Unit Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('units.view')->with($notification);

    }

    public function UnitEdit($id){

        $editData = Unit::find($id);

        return view('backend.unit.edit_unit',compact('editData'));

    }

    public function UnitUpdate(Request $request, $id){

        $data = Unit::find($id);

        $data->units_name = $request->units_name;
        $data->units_short_name = $request->units_short_name;

        $data->save();

        $notification = array(

            'message' => 'Unit Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('units.view')->with($notification);

    }

    public function UnitDelete($id){

        $category = Unit::find($id);
        $category->delete();

        $notification = array(

            'message' => 'Unit Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('units.view')->with($notification);

    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function LocationView(){

        abort_if(Gate::denies('location.view'), 403);
        

        $data['allData'] = Location::all();

        return view('backend.settings.view_location', $data);

    }

    public function LocationUpdate(Request $request, $id){

        $data = Location::find($id);

        $data->timezone = $request->timezone;
        $data->language = $request->language;
        $data->currency_symbol = $request->currency_symbol;

        $data->save();

        $notification = array(

            'message' => 'Location Updated Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('location.view')->with($notification);

    }
}

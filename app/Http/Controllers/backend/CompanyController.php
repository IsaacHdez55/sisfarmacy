<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Company;


class CompanyController extends Controller
{
   public function CompanyView(){

        $data['allData'] = Company::all();

        return view('backend.settings.view_company', $data);

    }

    public function CompanyUpdate(Request $request, $id){

        $validatedData = $request->validate([

            'name' => 'required',

        ]);

        $data = Company::find($id);

        $data->name = $request->name;
        $data->contact_person = $request->contact_person;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->postal_code = $request->postal_code;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->mobile = $request->mobile;
        $data->fax = $request->fax;
        $data->website = $request->website;

        $data->save();

        $notification = array(

            'message' => 'Company Updated Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('company.view')->with($notification);

    }
}

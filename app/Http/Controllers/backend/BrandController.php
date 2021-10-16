<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function BrandView(){

        $data['allData'] = Brand::all();

        return view('backend.brand.view_brand', $data);

    }

    public function BrandAdd(){

        return view('backend.brand.add_brand');

    }

    public function BrandStore(Request $request){

        $validatedData = $request->validate([

            'brand_name' => 'required|unique:brands'

        ]);

        $data = new Brand();

        $data->brand_name = $request->brand_name;
        $data->brand_description = $request->brand_description;

        $data->save();

        $notification = array(

            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('brands.view')->with($notification);

    }

    public function BrandEdit($id){

        $editData = Brand::find($id);

        return view('backend.brand.edit_brand',compact('editData'));

    }

    public function BrandUpdate(Request $request, $id){

        $data = Brand::find($id);

        $data->brand_name = $request->brand_name;
        $data->brand_description = $request->brand_description;

        $data->save();

        $notification = array(

            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('brands.view')->with($notification);

    }
    public function BrandDelete($id){

        $category = Brand::find($id);
        $category->delete();

        $notification = array(

            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('brands.view')->with($notification);

    }
}

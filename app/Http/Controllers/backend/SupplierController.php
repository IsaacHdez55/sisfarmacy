<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function SupplierView(){

        abort_if(Gate::denies('supplier.view'), 403);


        $data['allData'] = Supplier::all();

        return view('backend.supplier.view_supplier', $data);

    }

    public function SupplierAdd(){

        abort_if(Gate::denies('suppliers.add'), 403);


        return view('backend.supplier.add_supplier');

    }

    public function SupplierStore(Request $request){

        $validatedData = $request->validate([

            'supplier_identification' => 'required|unique:suppliers',
            'supplier_name_company' => 'required|unique:suppliers',
            'supplier_name' => 'required',
            'supplier_phone' => 'required'

        ]);

        $data = new Supplier();

        $data->supplier_identification = $request->supplier_identification;
        $data->supplier_name_company = $request->supplier_name_company;
        $data->supplier_name = $request->supplier_name;
        $data->supplier_phone = $request->supplier_phone;
        $data->supplier_address = $request->supplier_address;
        $data->supplier_phone_alternative = $request->supplier_phone_alternative;
        $data->supplier_email = $request->supplier_email;

        $data->save();

        $notification = array(

            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('supplier.view')->with($notification);

    }

    public function SupplierEdit($id){

        abort_if(Gate::denies('suppliers.edit'), 403);


        $editData = Supplier::find($id);
        return view('backend.supplier.edit_supplier',compact('editData'));

    }

    public function SupplierUpdate(Request $request, $id){

        $data = Supplier::find($id);

        $data->supplier_identification = $request->supplier_identification;
        $data->supplier_name_company = $request->supplier_name_company;
        $data->supplier_name = $request->supplier_name;
        $data->supplier_phone = $request->supplier_phone;
        $data->supplier_address = $request->supplier_address;
        $data->supplier_phone_alternative = $request->supplier_phone_alternative;
        $data->supplier_email = $request->supplier_email;

        $data->save();

        $notification = array(

            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('supplier.view')->with($notification);

    }

    public function SupplierDelete($id){

        abort_if(Gate::denies('suppliers.delete'), 403);


        $supplier = Supplier::find($id);
        $supplier->delete();

        $notification = array(

            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('supplier.view')->with($notification);

    }

    public function SupplierProfile($id){

        abort_if(Gate::denies('suppliers.profile'), 403);


        $editData = Supplier::find($id);

        return view('backend.supplier.view_profile_supplier', compact('editData'));

    }

}

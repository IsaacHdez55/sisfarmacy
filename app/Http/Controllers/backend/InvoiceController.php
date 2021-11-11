<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function InvoiceView(){

        abort_if(Gate::denies('invoice.view'), 403);

        $data['allData'] = Invoice::all();

        return view('backend.settings.view_invoice', $data);

    }

    public function InvoiceUpdate(Request $request, $id){

        $data = Invoice::find($id);

        $data->prefix = $request->prefix;
        $data->tax = $request->tax;

        if ($request->file('invoice_logo')) {
            
            $file = $request->file('invoice_logo');
            @unlink(public_path('upload/settings_image/'.$data->invoice_logo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/settings_image'),$filename);
            $data['invoice_logo'] = $filename;

        }

        $data->save();

        $notification = array(

            'message' => 'Invoice Updated Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('invoice.view')->with($notification);

    }
}

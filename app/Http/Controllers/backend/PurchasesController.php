<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  
use App\Models\Purchases;
use App\Models\PurchasesDetails;
use App\Models\Supplier;
use App\Models\Product;

use DB;
use PDF;

class PurchasesController extends Controller
{
    public function PurchasesView(){

        $data['allData'] = Purchases::all();

        return view('backend.purchases.view_purchases', $data);

    }

    public function PurchaseAdd(){

        $data['suppliers'] = Supplier::all();
        $data['products'] = Product::all();

        return view('backend.purchases.add_purchase', $data);

    }

    public function PurchaseStore(Request $request){

        $validatedData = $request->validate([

            'purchases_reference_number' => 'required|unique:purchases',
        ]);

        DB::transaction(function () use($request){

            $Purchase = new Purchases();
            $Purchase->purchases_supplier_id = $request->purchases_supplier_id;
            $Purchase->purchases_user_id = $request->purchases_user_id;
            $Purchase->purchases_reference_number = $request->purchases_reference_number;
            $Purchase->purchases_date_purchase = $request->purchases_date_purchase;
            $Purchase->purchases_status = $request->purchases_status;

            if ($request->hasFile('purchases_document')) {
            
                $file = $request->file('purchases_document');
                @unlink(public_path('upload/document_upload/'.$Purchase->purchases_document));
                $filename = date('YmdHi_').$file->getClientOriginalName();
                $file->move(public_path('upload/document_upload'),$filename);
                $Purchase['purchases_document'] = $filename;
            }            

            $Purchase->purchases_additional_notes = $request->purchases_additional_notes;
            $Purchase->purchases_tax = $request->purchases_tax;
            $Purchase->purchases_discount = $request->discount;
            $Purchase->purchases_total = $request->subtotal;
            $Purchase->purchases_grand_total = $request->grandtotal;

            $Purchase->save();

            //ENTER PURCHASE DETAILS

            $countDetails = count($request->product_id);
            
            if ($countDetails != NULL) {

                for ($i=0; $i < $countDetails ; $i++) { 

                    $purchaseDetails = new PurchasesDetails();
                    $purchaseDetails->purchases_id = $Purchase->id;
                    $purchaseDetails->product_id = $request->product_id[$i];
                    $purchaseDetails->quantity = $request->quantity[$i];            
                    $purchaseDetails->price = $request->price[$i];                    

                    $purchaseDetails->save();

                }// End For Loop

            }// End if Condition

        });

        $notification = array(

            'message' => 'Purchase Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('purchases.view')->with($notification);

    }

    public function ProductDelete($id){

        $product = Product::find($id);
        $product->delete();

        $notification = array(

            'message' => 'Product Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('product.view')->with($notification);

    }

    public function PurchaseDetails($id){

        // $data['detailsData'] = Purchases::find($id);

        $data['detailsData'] = PurchasesDetails::where('purchases_id',$id)->get();

        return view('backend.purchases.details_purchase', $data);

    }

    public function pdf($id){

        $data['detailData'] = Purchases::find($id);

        $data['detailsData'] = PurchasesDetails::where('purchases_id',$id)->get();

        $pdf = PDF::loadView('backend.purchases.pdf_purchases',$data);
        // return $pdf->stream();
        return $pdf->download('Purchases '.$data['detailData']['purchases_reference_number'].'.pdf');

    }

    public function change_status(Purchases $purchase)
    {

        if ($purchase->purchases_status == 'pending') {

            $purchase->update(['purchases_status'=>'requested']);
            return redirect()->back();

        }elseif ($purchase->purchases_status == 'requested') {

            $purchase->update(['purchases_status'=>'received']);
            return redirect()->back();

        }
        
    }


}

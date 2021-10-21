<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use PDF;

class PrintLabelsController extends Controller
{
    public function PrintLabelsView(){

        return view('backend.product.view_print_labels');

    }

    public function PrintLabelsSearch(Request $request){

        $query = $request->get('term','');
        
        $products = Product::where('product_name','LIKE','%'.$query.'%')->get();
        
        $data=array();

        foreach ($products as $product) {
                $data[]=array('value'=>$product->product_name,'id'=>$product->id);
        }

        if(count($data))

             return $data;

        else

            return ['value'=>'No Result Found','id'=>''];

    }

    public function PrintLabelsPdf(Request $request){

        $datos['datos'] = ['cantity'=>$request->cantity, 'product_id'=>$request->product_id];

        $datos['product'] = Product::find($request->product_id);

        $pdf = PDF::loadView('backend.product.printlabelspdf', $datos);
        // $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->setPaper('a4','landscape')->stream();
        // return $pdf->setPaper('a4','landscape')->download('Produtcs.pdf');

    }

}

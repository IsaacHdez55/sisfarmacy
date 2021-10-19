<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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

}

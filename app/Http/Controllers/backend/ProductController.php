<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Unit;
use PDF;

class ProductController extends Controller
{
    public function ProductView(){

        abort_if(Gate::denies('product.view'), 403);


        $data['allData'] = Product::all();

        return view('backend.product.view_product', $data);

    }

    public function ProductAdd(){

        abort_if(Gate::denies('product.add'), 403);


        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();

        return view('backend.product.add_product', $data);

    }

    public function ProductStore(Request $request){

        $validatedData = $request->validate([

            'product_name' => 'required|unique:products',
            'product_code' => 'required|unique:products'
        ]);

        $data = new Product();

        $data->product_code = $request->product_code;
        $data->product_name = $request->product_name;
        $data->product_brand = $request->product_brand;
        $data->product_unit = $request->product_unit;
        $data->product_category = $request->product_category;
        $data->product_stock = $request->product_stock;
        $data->product_purchase_price = $request->product_purchase_price;
        $data->product_selling_price = $request->product_selling_price;
        $data->product_sales = $request->product_sales;
        $data->product_expiration = $request->product_expiration;
        $data->product_rack = $request->product_rack;
        $data->product_row = $request->product_row;
        $data->product_position = $request->product_position;

        if ($request->file('product_image')) {
            
            $file = $request->file('product_image');
            @unlink(public_path('upload/product_image/'.$data->product_image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/product_image'),$filename);
            $data['product_image'] = $filename;

        }

        $data->save();

        $notification = array(

            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('product.view')->with($notification);

    }

    public function ProductEdit($id){

        abort_if(Gate::denies('product.edit'), 403);


        $data['editData'] = Product::find($id);
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();

        return view('backend.product.edit_product',$data);

    }

    public function ProductUpdate(Request $request, $id){

        $data = Product::find($id);

        $data->product_code = $request->product_code;
        $data->product_name = $request->product_name;
        $data->product_brand = $request->product_brand;
        $data->product_unit = $request->product_unit;
        $data->product_category = $request->product_category;
        $data->product_stock = $request->product_stock;
        $data->product_purchase_price = $request->product_purchase_price;
        $data->product_selling_price = $request->product_selling_price;
        $data->product_sales = $request->product_sales;
        $data->product_expiration = $request->product_expiration;
        $data->product_rack = $request->product_rack;
        $data->product_row = $request->product_row;
        $data->product_position = $request->product_position;

        if ($request->file('product_image')) {
            
            $file = $request->file('product_image');
            @unlink(public_path('upload/product_image/'.$data->product_image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/product_image'),$filename);
            $data['product_image'] = $filename;

        }

        $data->save();

        $notification = array(

            'message' => 'Product Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('product.view')->with($notification);

    }

    public function ProductDelete($id){

        abort_if(Gate::denies('product.delete'), 403);


        $product = Product::find($id);
        $product->delete();

        $notification = array(

            'message' => 'Product Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('product.view')->with($notification);

    }

    public function ProductDetails($id){

        abort_if(Gate::denies('product.details'), 403);


        $data['detailsData'] = Product::find($id);

        return view('backend.product.details_product', $data);

    }

    public function pdf(){

        abort_if(Gate::denies('product.pdf'), 403);


        $data['allData'] = Product::all();

        $pdf = PDF::loadView('backend.product.pdf',$data);
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->setPaper('a4','landscape')->stream();
        return $pdf->setPaper('a4','landscape')->download('Produtcs.pdf');

    }

}

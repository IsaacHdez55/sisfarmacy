<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoriesView(){

        $data['allData'] = Category::all();

        return view('backend.categories.view_categories', $data);

    }

    public function CategoriesAdd(){

        return view('backend.categories.add_category');

    }

    public function CategoriesStore(Request $request){

        $validatedData = $request->validate([

            'category_name' => 'required|unique:categories',
            'category_code' => 'required|unique:categories'

        ]);

        $data = new Category();

        $data->category_name = $request->category_name;
        $data->category_code = $request->category_code;

        $data->save();

        $notification = array(

            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('categories.view')->with($notification);

    }

    public function CategoriesEdit($id){

        $editData = Category::find($id);

        return view('backend.categories.edit_category',compact('editData'));

    }

    public function CategoriesUpdate(Request $request, $id){

        $data = Category::find($id);

        $data->category_name = $request->category_name;
        $data->category_code = $request->category_code;

        $data->save();

        $notification = array(

            'message' => 'Category Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('categories.view')->with($notification);

    }

    public function CategoriesDelete($id){

        $category = Category::find($id);
        $category->delete();

        $notification = array(

            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('categories.view')->with($notification);

    }
}

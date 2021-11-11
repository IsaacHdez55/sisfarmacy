<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function CategoryView(){

        // abort_if(Gate::denies('brands.view'), 403);


        $data['allData'] = ExpenseCategory::all();

        return view('backend.expenses.view_category', $data);

    }

    public function CategoryAdd(){

        // abort_if(Gate::denies('brands.add'), 403);

        return view('backend.expenses.add_category');

    }

    public function CategoryStore(Request $request){

        $validatedData = $request->validate([

            'name' => 'required|unique:expense_categories',
            'code' => 'required|unique:expense_categories'

        ]);

        $data = new ExpenseCategory();

        $data->name = $request->name;
        $data->code = $request->code;

        $data->save();

        $notification = array(

            'message' => 'Expense Category Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('category.view')->with($notification);

    }

    public function CategoryEdit($id){

        // abort_if(Gate::denies('brands.edit'), 403);

        $editData = ExpenseCategory::find($id);

        return view('backend.expenses.edit_category',compact('editData'));

    }

    public function CategoryUpdate(Request $request, $id){

        $data = ExpenseCategory::find($id);

        $data->name = $request->name;
        $data->code = $request->code;

        $data->save();

        $notification = array(

            'message' => 'Expense Category Updated Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('category.view')->with($notification);

    }

    public function CategoryDelete($id){

        // abort_if(Gate::denies('brands.delete'), 403);

        $category = ExpenseCategory::find($id);
        $category->delete();

        $notification = array(

            'message' => 'Expense Category Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('category.view')->with($notification);

    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function ExpenseView(){

        // abort_if(Gate::denies('brands.view'), 403);


        $data['allData'] = Expense::all();

        return view('backend.expenses.view_expense', $data);

    }

    public function ExpenseAdd(){

        // abort_if(Gate::denies('brands.add'), 403);

        $data['expenseCategory'] = ExpenseCategory::all();

        return view('backend.expenses.add_expense', $data);

    }

    public function ExpenseStore(Request $request){

        $validatedData = $request->validate([

            'reference_number' => 'required|unique:expenses',

        ]);

        $data = new Expense();

        $data->expenses_category_id = $request->expenses_category_id;
        $data->reference_number = $request->reference_number;
        $data->date = $request->date;
        $data->total_amount = $request->total_amount;

        if ($request->hasFile('attachment')) {
            
            $file = $request->file('attachment');
            @unlink(public_path('upload/expenses_upload/'.$data->attachment));
            $filename = date('YmdHi_').$file->getClientOriginalName();
            $file->move(public_path('upload/expenses_upload'),$filename);
            $data['attachment'] = $filename;
        }

        $data->expense_note = $request->expense_note;

        $data->save();

        $notification = array(

            'message' => 'Expense Inserted Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('expenses.view')->with($notification);

    }

    public function ExpenseEdit($id){

        // abort_if(Gate::denies('brands.edit'), 403);
        
        $expenseCategory = ExpenseCategory::all();
        $editData = Expense::find($id);

        return view('backend.expenses.edit_expense',compact('editData','expenseCategory'));

    }

    public function ExpenseUpdate(Request $request, $id){

        $data = Expense::find($id);

        $data->expenses_category_id = $request->expenses_category_id;
        $data->reference_number = $request->reference_number;
        $data->date = $request->date;
        $data->total_amount = $request->total_amount;

        if ($request->hasFile('attachment')) {
            
            $file = $request->file('attachment');
            @unlink(public_path('upload/expenses_upload/'.$data->attachment));
            $filename = date('YmdHi_').$file->getClientOriginalName();
            $file->move(public_path('upload/expenses_upload'),$filename);
            $data['attachment'] = $filename;
        }

        $data->expense_note = $request->expense_note;

        $data->save();

        $notification = array(

            'message' => 'Expense Updated Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('expenses.view')->with($notification);

    }

    public function ExpenseDelete($id){

        // abort_if(Gate::denies('brands.delete'), 403);

        $expense = Expense::find($id);
        $expense->delete();

        $notification = array(

            'message' => 'Expense Deleted Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('expenses.view')->with($notification);

    }

    public function change_status(Expense $expenses)
    {

        // abort_if(Gate::denies('purchases.change_status'), 403);
        

        if ($expenses->status == 'pending') {

            $expenses->update(['status'=>'paid']);
            return redirect()->back();

        }
        
    }

}

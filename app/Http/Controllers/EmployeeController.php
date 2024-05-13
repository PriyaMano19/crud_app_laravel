<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   
    public function index(Request $req){
        $employee = Employee::all();
        return  view('welcome')->with("employee",$employee);
    }


    public function add(Request $req){

        $validatedData = $req->validate([
          'first_name' => 'required|string|max:20',
          'last_name' => 'required|string|max:20',
          'contact_num' => 'required|string|min:9|max:10|regex:/^[0-9]+$/',
          'email_add' => 'required|email',
        ],[
          'first_name.required' => __('First Name is required'),
          'last_name.required' => __('Last Name is required'),
          'contact_num.required' => __('Contact number is required'),
          'contact_num.numeric' => __('Contact number must be numeric'),
          'contact_num.min' => __('Contact number must be at least 9 digits'),
          'contact_num.max' => __('Contact number must not exceed 10 digits'),
          'email_add.required' => __('Email is required'),
          'email_add.email' => __('Email is invalid'),
        ]);
        $employee = new Employee;
        $employee->emp_name = $req->emp_name;
        $employee->address = $req->address;
        $employee->contact_num = $req->contact_num;
        $employee->email_add = $req->email_add;
        $employee->save();

        return redirect()->back();
    }


    public function delete(Request $req){
        $employee = Employee::find($req->id);
        $employee->delete();
        return redirect()->back();
    }


    public function edit(Request $req){
        $employee = Employee::find($req->id);
        return view('edit')->with("employee",$employee);
    }


    public function update(Request $req){
        $employee = Employee::find($req->id);
        
        $validatedData = $req->validate([
          'first_name' => 'required|string|max:20',
          'last_name' => 'required|string|max:20',
          'contact_num' => 'required|string|min:9|max:10|regex:/^[0-9]+$/',
          'email_add' => 'required|email',
        ],[
          'first_name.required' => __('First Name is required'),
          'last_name.required' => __('Last Name is required'),
          'contact_num.required' => __('Contact number is required'),
          'contact_num.numeric' => __('Contact number must be numeric'),
          'contact_num.min' => __('Contact number must be at least 9 digits'),
          'contact_num.max' => __('Contact number must not exceed 10 digits'),
          'email_add.required' => __('Email is required'),
          'email_add.email' => __('Email is invalid'),
        ]);
        $employee->update([
            'emp_name' => $req->emp_name,
            'address' => $req->address,
            'contact_num' => $req->contact_num,
            'email_add' => $req->email_add,
        ]);
        return redirect()->back();

    }


}
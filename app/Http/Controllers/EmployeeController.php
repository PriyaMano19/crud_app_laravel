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
        $employee->update([
            'emp_name' => $req->emp_name,
            'address' => $req->address,
            'contact_num' => $req->contact_num,
            'email_add' => $req->email_add,
        ]);
        return redirect()->back();

    }


}

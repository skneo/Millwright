<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function show_form()
    {
        $edit = 0;
        $page_heading = 'Add Employee';
        $submit_url = '/add-employee';
        $data = compact('edit', 'submit_url', 'page_heading');
        return view('employeeForm')->with($data);
    }
    public function all_employees()
    {
        $employees = Employee::all();
        $data = compact('employees');
        return view('allEmployees')->with($data);
    }
    public function add_employee(Request $request)
    {
        $request->validate(
            [
                'emp_name' => 'required',
                'emp_num' => 'required',
                'design' => 'required',
                'joinDate' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                'rest' => 'required'
            ]
        );
        $employee = new Employee();
        $employee->name = $request['emp_name'];
        $employee->emp_no = $request['emp_num'];
        $employee->design = $request['design'];
        $employee->joinDate = $request['joinDate'];
        $employee->mobile = $request['mobile'];
        $employee->email = $request['email'];
        $employee->rest = $request['rest'];
        $employee->save();
        $request->session()->flash('success', $employee->name . ' added!');
        return redirect('/employees');
    }
    public function edit(Request $request, $id)
    {
        $emp = Employee::find($id);
        if (!is_null($emp)) {
            $page_heading = "Edit Employee";
            $edit = 1;
            $submit_url = '/update-employee/' . $id;
            $data = compact('emp', 'page_heading', 'edit', 'submit_url');
            return view('employeeForm')->with($data);
        } else {
            $request->session()->flash('danger', 'No product found with id ' . $id);
        }
        return redirect('/employees');
    }
    public function update(Request $request, $id)
    {
        $emp = Employee::find($id);
        $request->validate(
            [
                'emp_name' => 'required',
                'emp_num' => 'required',
                'design' => 'required',
                'joinDate' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                'rest' => 'required'
            ]
        );
        $emp->name = $request['emp_name'];
        $emp->emp_no = $request['emp_num'];
        $emp->design = $request['design'];
        $emp->joinDate = $request['joinDate'];
        $emp->mobile = $request['mobile'];
        $emp->email = $request['email'];
        $emp->rest = $request['rest'];
        $emp->save();
        $request->session()->flash('success', $emp->name . ' updated!');
        return redirect('/employees');
    }
    public function delete(Request $request, $id)
    {
        $emp = Employee::find($id);
        if (!is_null($emp)) {
            $emp->delete();
            $request->session()->flash('success', $emp->name . ' deleted !');
        } else {
            $request->session()->flash('danger', 'No employee found with id ' . $id);
        }
        return redirect('/employees');
    }
}

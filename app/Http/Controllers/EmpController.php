<?php

namespace App\Http\Controllers;

use App\Models\emp;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $employee = emp::all();
        // dd($employee);
        // return view("index",["emp"=> $employee]);
        $employee = emp::orderBy("id","ASC")->paginate(3);
        return view("index",compact("employee"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //custome error message
        $request->validate([
            "name"=> "required",
            "email"=> "required|unique:emps,email|email",
            "joining_date"=> "required",
            "joining_salary"=> "required|numeric",
        ],[
            "email.unique"=> "Email has been Already Exist",
            "email"=> "Enter the Email Id",
        ]);
        // $request->all();
        $data = $request->except('_token');

        //mass assegnment
        emp::create($data); 

        //insert single row
        // $employee = new Emp();
        // $employee->name = $data['name'];
        // $employee->email = $data['email'];
        // $employee->joining_date = $data['joining_date'];
        // $employee->joining_salary = $data['joining_salary'];
        // $employee->is_active = $data['is_active'];
        // $employee->save();
        // dd('success');
        return redirect()->route('employee.index')->withMessage('Employee as been created successfully');
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = emp::findOrFail($id);
        return view('show',compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $emp = emp::findOrFail($id);
       return view('edit',compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, emp $emp)
    {
        $request->validate([
            "name"=> "required",
            'email'=> 'required|unique:emps,email,'.$emp->id.'|email',
            "joining_date"=> "required",
            "joining_salary"=> "required|numeric",
        ],[
            "email.unique"=> "Email has been Already Exist",
            "email"=> "Enter the Email Id",
        ]);
        // dd($emp);
        $data = $request->all();
        // $emp = emp::find($id);
        $emp->update($data);
        return redirect()->route('employee.edit',$emp->id)->withMessage('Employee as been Updated successfully');
        // dd('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = emp::findOrFail($id);
        $emp->delete();
        return redirect()->route('employee.index',$emp->id)->withMessage('Employee as been Deleted successfully');
    }
}

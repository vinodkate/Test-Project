<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;

class EmployeeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $employees = Employee::paginate(10);
      return view('employee.index', compact('employees'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Employee $employee)
  {
      $companies = Company::pluck('name','id')->all();
      return view('employee.form', compact('employee', 'companies'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate([
          'company_id' => 'required',
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email|unique:employees',
          'phone' => 'required|numeric',
      ],[
        'company_id.required' => "The company field is required."
      ]);

      $employee = Employee::create($request->all());

      return redirect()->route('employee.index')->with('message', 'Employee Created Successfully');


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $employee = Employee::find($id);
      $companies = Company::pluck('name','id')->all();
      return view('employee.form', compact('employee', 'companies'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $employee = Employee::find($id);
      $employee->fill($request->all())->save();

      return redirect()->route('employee.index')->with('message', 'Employee Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $employee = Employee::find($id);
      $employee->delete();

      return redirect()->route('employee.index')->with('message', 'Employee Deleted Successfully');
  }
}

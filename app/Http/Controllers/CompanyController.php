<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Mail\CompanyRegister;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('company.form', compact('company'));
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
            'name' => 'required',
            'email' => 'required|email|unique:companies',
            'logo' => 'required|dimensions:min_width=100,min_height=100|mimes:jpeg,png',
            'website' => 'required|url',
        ]);

        $rand = rand(1,100000000);
        $ext = $request->logo->extension();
        $image = $rand.$ext;
        // valid insert data
        $path = $request->file('logo')->storeAs('public/logo', $image);
        $company = Company::create([
          'name' => $request->name,
          'email' => $request->email,
          'website' => $request->website,
          'logo' => $image
        ]);

        @Mail::to($request->email)->send(new CompanyRegister($company));

        return redirect()->route('company.index')->with('message', 'Company Created Successfully');


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
        $company = Company::find($id);
        return view('company.form', compact('company'));
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
        $company = Company::find($id);
        $rand = rand(1,100000000);
        $ext = $request->logo->extension();
        $image = $rand.$ext;
        // valid insert data
        $path = $request->file('logo')->storeAs('public/logo', $image);
        $company->fill([
          'name' => $request->name,
          'email' => $request->email,
          'website' => $request->website,
          'logo' => $image
        ])->save();

        return redirect()->route('company.index')->with('message', 'Company Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('company.index')->with('message', 'Company Deleted Successfully');
    }
}

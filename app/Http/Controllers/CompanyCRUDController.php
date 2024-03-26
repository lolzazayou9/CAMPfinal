<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyCRUDController extends Controller
{
    // Creat index
    public function index(){
        $data['companies'] = Company::orderby('id','asc')->paginate(5); //เรียกข้อมูลจากฐานข้อมูลcompanies โดยเรียกตามID เรียงข้อมูลจากมากไปน้อย และจำกัดข้อมูล5ข้อมูล
        return view('companies.index', $data);
    }

    // creat resource
    public function create(){
        return view('companies.create');
    }

    //store resource
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'avatar' => 'required'
        ]);

        $company = new Company;
        $company->title = $request->title;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->avatar = $request->avatar;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'User has been created  successfully.');
    }

    public function edit(Company $company){
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company has been update  successfully.');

    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company has been delete  successfully.');
    }
}

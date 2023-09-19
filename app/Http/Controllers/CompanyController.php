<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index(){
        $campanies = Company::all();
        return view('campanies.index',compact('campanies'));
    }


    public function create(){
        return view('campanies.create');
    }

    public function store(StoreCompanyRequest $request)
    {


        $validatedData = $request->validated();
        $company = new Company();
        $company->name = $validatedData['name'];
        $company->email = $validatedData['email'];
        $company->website = $validatedData['website'];


        $newLogoName=$request->file('logo')->hashName();
        $request->file('logo')->move(public_path('images\campanies'),$newLogoName);

        $data=$request->except('logo','_token');
        $data['logo']=$newLogoName;

        if(DB::table('companies')->insert($data))
        {
            return redirect()->route('dashboard.campanies.index')->with('success', 'Company created successfully');
        }else{
            return redirect()->back()->with('error', 'somthing went wrong');
        }


    }


    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('campanies.edit', compact('company'));
    }


    public function update(UpdateCompanyRequest $request, $id)
    {

        $validatedData = $request->validated();
        $company = Company::findOrFail($id);

        $company->name = $validatedData['name'];
        $company->email = $validatedData['email'];
        $company->website = $validatedData['website'];


        if ($request->hasFile('logo')) {
            $newLogoName = $request->file('logo')->hashName();
            $request->file('logo')->move(public_path('images/companies'), $newLogoName);

            $company->logo = $newLogoName;
        }
        if ($company->save()) {
            return redirect()->route('dashboard.campanies.index')->with('success', 'Company updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


    public function destroy($id)
    {
        $company=Company::find($id);
        $company->delete();

        return redirect()->route('dashboard.campanies.index')->with('success', 'Company deleted successfully');
    }
}

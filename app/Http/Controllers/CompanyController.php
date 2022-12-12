<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        //dump($companies);
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        $sectors = $company->groupBy('sector');
        return view('company.create',compact('sectors'));
    }
    
    public function viewCompare()
    {
        $companies = Company::all();
        $sectors = $companies->sortBy('symbol');
        //dump($companies);
        return view('company.compare',compact('companies'));
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
            'name' => ['required', 'string', 'max:255','unique:companies'],
            'symbol' => ['required', 'string','unique:companies'],
            'sector' => ['required', 'string', 'max:255']
        ]);
        
        $company = new Company([
            'name' => $request->name,
            'symbol' => $request->symbol,
            'sector' => $request->sector,
        ]);

        $company->save();
        Alert::success('Company Registered!', 'Company successfully created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $company = Company::where('id',$id)->first();
        return view('company.view_details',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::all();
        $sectors = $company->groupBy('sector');

        $company = Company::where('id',$id)->first();
        return view('company.edit_details',compact('company','sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => ['required'],
            'symbol' => ['required'],
            'sector' => ['required']
        ]);

        $company = Company::where('id',$id)->first();
        $company->name = $request->name;
        $company->symbol = $request->symbol;
        $company->sector = $request->sector;

        $company->save();

        Alert::success('Company Updated!', 'Company information successfully updated.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Company::where('id',$id)->first();
        $companies->delete();
        Alert::success('Company Deleted!', 'Company successfully deleted.');
        return redirect()->back();
    }

    public function listbySector($sector)
    {
        $companies = Company::where('sector',$sector)->get();
        return view('company.list_bySector',compact('companies','sector'));
    }
}

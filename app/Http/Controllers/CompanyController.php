<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
       
            $companies=Company::where([
                ['name','!=',Null],[function ($query) use ($request){

                    if(($term =$request->term))
                    {
                        $query->orWhere('name','LIKE','%'.$term.'%' )->get();
                        $query->orWhere('email','LIKE','%'.$term.'%' )->get();

                    }
                }]
            ])->orderBy('id')->paginate(5);

      
        //     $companies = Company::all();

        // }
        // $data=compact('companies','search');

        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'email' => 'required|unique:companies',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            

        ]);
      
        if ($request->hasFile('logo')) {
            $file_exsetention=$request->logo->getClientOriginalExtension();
            $filename=time() . "." . $file_exsetention;
            $path='images/logo';
        
             $request->logo->move($path,$filename);
             
        }
    
        Company::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'logo'=>$filename,
            'website'=>$request->website,
            
         ]);

        return redirect()->route('companies.index')->with('success','companiey created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('logo')) {
            $file_exsetention=$request->logo->getClientOriginalExtension();
            $filename=time() . "." . $file_exsetention;
            $path='images/logo';
        
             $request->logo->move($path,$filename);
             
        }
    

        $company->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'logo'=>$filename,
            'website'=>$request->website,
            
         ]);

        return redirect()->route('companies.index')->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        
       return redirect()->route('companies.index')
       ->with('success','company deleted successfully');
       
    }
}

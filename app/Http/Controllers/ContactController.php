<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(5);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data=Company::all();
        return view("contacts.create",["dervied"=>$data]);
       
      
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
            'fname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'company' => 'required',
            'email' => 'required|unique:contacts',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success','Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        // return view('contacts.edit',compact('contact'));
        
        $data=Company::all();
        return view("contacts.edit",["dervied"=>$data],compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'fname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',

        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success','contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
      $contact->delete();

       return redirect()->route('contacts.index')
                       ->with('success','contact deleted successfully');
    }

    
}
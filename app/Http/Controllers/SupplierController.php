<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Country;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with('country')->paginate(20)->appends(request()->query());;
        return view('supplier.index',compact('suppliers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('supplier.create',compact('countries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'latter' => 'required',
            'country' => 'required|numeric',
            'contact_number' => 'required',
            'status' => 'required|numeric',
            'email_address' => 'required',
            'terminate_url' => 'required',
            'complete_url' => 'required',
            'quotafull_url' => 'required',
            'security_url' => 'required',
            'panel_size' => 'required',
        ]);
        if(Supplier::create([
            'name'=>$request->name,
            'latter'=>$request->latter,
            'country_id'=>$request->country,
            'contact_number'=>$request->contact_number,
            'email_address'=>$request->email_address,
            'terminate_url'=>$request->terminate_url,
            'quotafull_url'=>$request->quotafull_url,
            'complete_url'=>$request->complete_url,
            'security_term_url'=>$request->security_url,
            'panel_size'=>$request->panel_size,
            'status'=>$request->status,
        ])){
            return redirect('supplier')->with('success', 'Supplier added successfully.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->ajax()){
            return Supplier::find($id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $supplier = Supplier::find($id);
        return view('supplier.edit',compact('countries','supplier'));
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
        $request->validate([
            'name' => 'required|string',
            'latter' => 'required',
            'country' => 'required|numeric',
            'contact_number' => 'required',
            'status' => 'required|numeric',
            'email_address' => 'required',
            'terminate_url' => 'required',
            'complete_url' => 'required',
            'quotafull_url' => 'required',
            'security_url' => 'required',
            'panel_size' => 'required',
        ]);
        if(Supplier::where('id',$id)->update([
            'name'=>$request->name,
            'latter'=>$request->latter,
            'country_id'=>$request->country,
            'contact_number'=>$request->contact_number,
            'email_address'=>$request->email_address,
            'terminate_url'=>$request->terminate_url,
            'quotafull_url'=>$request->quotafull_url,
            'complete_url'=>$request->complete_url,
            'security_term_url'=>$request->security_url,
            'panel_size'=>$request->panel_size,
            'status'=>$request->status,
        ])){
            return redirect('supplier')->with('success', 'Supplier updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

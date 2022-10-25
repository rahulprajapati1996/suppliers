<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('country')->paginate(20)->appends(request()->query());
        return view('client.index',compact('clients'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('client.create',compact('countries'));
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
        ]);
        if(Client::create([
            'name'=>$request->name,
            'latter'=>$request->latter,
            'country_id'=>$request->country,
            'contact_number'=>$request->contact_number,
            'email_address'=>$request->email_address,
            'status'=>$request->status,
        ])){
            return redirect('client')->with('success', 'Client added successfully.');
        }
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
        $countries = Country::all();
        $client = Client::find($id);
        return view('client.edit',compact('countries','client'));
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
        ]);
        if(Client::where('id',$id)->update([
            'name'=>$request->name,
            'latter'=>$request->latter,
            'country_id'=>$request->country,
            'contact_number'=>$request->contact_number,
            'email_address'=>$request->email_address,
            'status'=>$request->status,
        ])){
            return redirect('client')->with('success', 'Client updated successfully.');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Client;
use App\Patient;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname_C' => 'required',
            'lastname_C' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        Client::insert([
            'client_firstname' => $request->input('firstname_C'),
            'client_lastname' => $request->input('lastname_C'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email')
        ]);

        return redirect('/clients')->with('success', 'Cliënt toegevoegd');
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
        $client = Client::find($id);
        return view('clients.edit')->with('client', $client);
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
        $this->validate($request, [
            'firstname_C' => 'required',
            'lastname_C' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        Client::where(['client_id' => $id])
            ->update([
            'client_firstname' => $request->input('firstname_C'),
            'client_lastname' => $request->input('lastname_C'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email')
        ]);

        return redirect('/clients')->with('success', 'Cliënt gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::where(['client_id' => $id])->delete();
        Client::where(['client_id' => $id])->delete();

        return redirect('/clients')->with('success', 'Cliënt verwijderd');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Patient;
use App\Client;
use App\Species;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = DB::table('patients')
                            ->join('species', 'patients.species_id', '=', 'species.species_id')
                            ->join('clients', 'patients.client_id', '=', 'clients.client_id')
                            ->select('patients.patient_id', 'patients.patient_gender','patients.patient_name', 'patients.patient_status', 'species.species_description', 'clients.client_firstname', 'clients.client_lastname')
                            ->orderBy('clients.client_firstname')
                            ->get();
        return view('patients.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data[0] = Client::select(DB::raw("CONCAT(client_firstname, ' ', client_lastname) AS client_fullname"), 'client_id')->get()->pluck('client_fullname', 'client_id');
        $data[1] = Species::pluck('species_description', 'species_id');
        return view('patients.create')->with('data', $data);
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
            'name_P' => 'required',
            'species' => 'required',
            'gender' => 'required',
            'client' => 'required',
            'status' => 'required'
        ]);

        Patient::insert([
            'patient_name' => $request->input('name_P'),
            'species_id' => $request->input('species'),
            'patient_gender' => $request->input('gender'),
            'client_id' => $request->input('client'),
            'patient_status' => $request->input('status')
        ]);

        return redirect('/patients')->with('success', 'Patient toegevoegd');
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
        $patient = Patient::find($id);
        $data[0] = Client::select(DB::raw("CONCAT(client_firstname, ' ', client_lastname) AS client_fullname"), 'client_id')->get()->pluck('client_fullname', 'client_id');
        $data[1] = Species::pluck('species_description', 'species_id');
        return view('patients.edit')->with('patient', $patient)->with('data', $data);
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
            'name_P' => 'required',
            'species' => 'required',
            'gender' => 'required',
            'client' => 'required',
            'status' => 'required'
        ]);

        Patient::where(['patient_id' => $id])->update([
            'patient_name' => $request->input('name_P'),
            'species_id' => $request->input('species'),
            'patient_gender' => $request->input('gender'),
            'client_id' => $request->input('client'),
            'patient_status' => $request->input('status')
        ]);

        return redirect('/patients')->with('success', 'Patient gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::where(['patient_id' => $id])->delete();

        return redirect('/patients')->with('success', 'Patient verwijderd');
    }
}

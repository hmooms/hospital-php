@extends('layouts.app')

@section('content')

    <h1>Patienten</h1>

    <ul>

        <li><a href={{ url('./clients')}}>clienten</a></li>
        <li><a href={{ url('./species')}}>diersoorten</a></li>

    </ul>

    @if(count($patients) > 0)

    <table class="table">

        <thead>

            <tr>
                <th onclick="sortTable(0)">Naam</th>
                <th onclick="sortTable(1)">Diersoort</th>
                <th onclick="sortTable(2)">geslacht</th>
                <th onclick="sortTable(3)">Status</th>
                <th onclick="sortTable(4)">Client</th>
                <th colspan="2">Actie</th>
            </tr>

        </thead>

        <tbody>

            @foreach($patients as $patient)

                <tr>
                    <td>{{$patient->patient_name}}</td>
                    <td>{{$patient->species_description}}</td>
                    <td>{{$patient->patient_gender}}</td>
                    <td>{{$patient->patient_status}}</td>
                    <td>{{$patient->client_firstname}} {{$patient->client_lastname}}</td>
                    <td><a class="btn btn-info" href="/Hospital/patients/{{$patient->patient_id}}/edit">wijzig</a></td>
                    <td>
                        {!!Form::open(['action' => ['PatientsController@destroy', $patient->patient_id], 'method' => 'POST', 'onSubmit' => 'return confirmDelete()'])!!}

                            {{Form::hidden('_method', 'DELETE')}}

                            {{Form::submit('verwijderen', ['class' => 'btn btn-danger'])}}

                        {!!Form::close()!!}

                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

    @else
        <p>geen patienten</p>
    @endif

    <a href={{ url('patients/create')}} class="btn btn-success">creër een patient</a>

    <script>
    
        //------Ask for confirmation------\\
        
        function confirmDelete()
        {
            var result = confirm('Weet je zeker dat je deze patient wilt verwijderen?');
    
            if (result)
                return true;
            else 
                return false;
        }
        
    </script>
@endsection


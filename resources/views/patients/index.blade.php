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
@endsection

<script> 

    //------Ask for confirmation------\\

    function confirmDelete()
    {
        var result = confirm('Weet je zeker dat je deze patient wil verwijderen?');

        if (result)
            return true;
        else 
            return false;
    }

    // ------Sort table------ \\

    function sortTable(n)
    {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchCount = 0; 
        
        table = document.getElementsByClassName('table')[0];
        switching = true;
        dir = "asc";
        
        while (switching) {

            switching = false;

            rows = table.getElementsByTagName('tr');

            for(i = 1; i < (rows.length - 1); i++) {

                shouldSwitch = false;

                x = rows[i].getElementsByTagName('td')[n]
                y = rows[i + 1].getElementsByTagName('td')[n];

                if (dir == "asc") {

                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {

                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()){

                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {

                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;

                switchCount++;
            }   else {

                if (switchCount == 0 && dir == "asc") {

                    dir = "desc";
                    switching = true;
                } 
            }
        }   
    }
</script>
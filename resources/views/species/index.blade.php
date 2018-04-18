@extends('layouts.app')

@section('content')

    <h1>Diersoorten</h1>

    <ul>

        <li><a href={{ url('./patients')}}>patienten</a></li>
        <li><a href={{ url('./clients')}}>clienten</a></li>

    </ul>

    @if(count($species) > 0)

    <table class="table">

        <thead>

            <tr>
                <th onclick="sortTable(0)">#</th>
                <th onclick="sortTable(1)">Diersoort</th>
                <th colspan="2">Actie</th>
            </tr>

        </thead>

        <tbody>

            @foreach($species as $specie)

                <tr>
                    <td>{{$specie->species_id}}</td>
                    <td>{{$specie->species_description}}</td>
                    <td><a class="btn btn-info" href="/Hospital/species/{{$specie->species_id}}/edit">wijzig</a></td>
                    <td>

                        {!!Form::open(['action' => ['SpeciesController@destroy', $specie->species_id], 'method' => 'POST', 'onSubmit' => 'return confirmDelete()'])!!}

                            {{Form::hidden('_method', 'DELETE')}}

                            {{Form::submit('verwijderen', ['class' => 'btn btn-danger'])}}
                        
                        {!!Form::close()!!}

                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

    @else
        <p>Geen diersoorten</p>
    @endif

    <a href={{ url('/species/create')}} class="btn btn-success">Diersoort toevoegen</a>

    <script>
    
    //------Ask for confirmation------\\
    
    function confirmDelete()
    {
        var result = confirm('Weet je zeker dat je dit diersoort wilt verwijderen? Als er een patient bestaat met dit diersoort wordt die ook verwijderd.');

        if (result)
            return true;
        else 
            return false;
    }
    
    </script>
@endsection



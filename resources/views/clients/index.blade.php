@extends('layouts.app')

@section('content')

    <h1>Clienten</h1>

    <ul>

        <li><a href={{ url('./patients')}}>patienten</a></li>
        <li><a href={{ url('./species')}}>diersoorten</a></li>

    </ul>

    @if(count($clients) > 0)

    <table class="table">

        <thead>

            <tr>
                <th onclick="sortTable(0)">Voornaam</th>
                <th onclick="sortTable(1)">Achternaam</th>
                <th onclick="sortTable(2)">telefoon</th>
                <th onclick="sortTable(3)">Email</th>
                <th colspan="2">Actie</th>
            </tr>

        </thead>

        <tbody>

            @foreach($clients as $client)

                <tr>
                    <td>{{$client->client_firstname}}</td>
                    <td>{{$client->client_lastname}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td><a class="btn btn-info" href="/Hospital/clients/{{$client->client_id}}/edit">wijzig</a></td>
                    <td>
                    
                        {!!Form::open(['action' => ['ClientsController@destroy', $client->client_id], 'method' => 'POST', 'onSubmit' => 'return confirmDelete()'])!!}

                            {{Form::hidden('_method', 'DELETE')}}

                            {{Form::submit('verwijderen', ['class' => 'btn btn-danger'])}}

                        {!!Form::close()!!}
                        
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

    @else
        <p>Geen clienten</p>
    @endif

    <a href={{ url('/clients/create')}} class="btn btn-success">Client toevoegen</a>

    <script>
    
        //------Ask for confirmation------\\
        
        function confirmDelete()
        {
            var result = confirm('Weet je zeker dat je deze client wilt verwijderen? Als er een patient bestaat met deze client wordt die ook verwijderd.');
    
            if (result)
                return true;
            else 
                return false;
        }
        
    </script>

@endsection

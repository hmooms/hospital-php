@extends('layouts.app')

@section('content')

<h1>Wijzig patient</h1>

<hr>

{!! Form::open(['action' => ['PatientsController@update', $patient->patient_id], 'method' => 'POST']) !!}

    <div class="form-group">

        {{Form::label('name_P', 'patient naam:')}}

        {{Form::text('name_P', $patient->patient_name, ['class' => 'form-control', 'placeholder' => 'patient naam'])}}

    </div>

    <div class="form-group">

        {{Form::label('species', 'Diersoort:')}} 
        
        {{Form::select('species', $data[1], $patient->species_id, ['class' => 'form-control', 'placeholder' => 'Kies een diersoort'])}}

        <a href={{ url('./species/create')}}><h4>+diersoort toevoegen</h4></a>
    
    </div>

    <div class="form-check">

        {{Form::label('gender', 'geslacht patient:')}}<br>

        @if($patient->patient_gender == 'Mannelijk')

            {{form::radio('gender', 'Mannelijk', true)}}
            {{Form::label('gender', 'Mannelijk')}}<br>

            {{Form::radio('gender', 'Vrouwelijk')}}
            {{Form::label('gender', 'Vrouwelijk')}}

        @else

            {{form::radio('gender', 'Mannelijk')}}
            {{Form::label('gender', 'Mannelijk')}}<br>

            {{Form::radio('gender', 'Vrouwelijk', true)}}
            {{Form::label('gender', 'Vrouwelijk')}}

        @endif

    </div>

    <div class="form-group">

        {{Form::label('client', 'Cliënt:')}}

        {{Form::select('client', $data[0], $patient->client_id, ['class' => 'form-control', 'placeholder' => 'kies een client'])}}

        <a href={{ url('./clients/create')}}><h4>+cliënt toevoegen</h4></a>

    </div>

    <div class="form-group">

        {{Form::label('status', 'patient status:')}}

        {{Form::textarea('status', $patient->patient_status, ['class' => 'form-control', 'placeholder' => 'status van de patient'])}}
    </div>

    {{Form::hidden('_method', 'PUT')}}

    {{Form::submit('wijzigen', ['class' => 'btn btn-primary'])}}

    <a href={{ url('./patients')}} class="btn btn-danger">annuleren</a> 

{!! Form::close() !!}

@endsection
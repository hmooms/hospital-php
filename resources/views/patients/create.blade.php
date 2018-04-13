@extends('layouts.app')

@section('content')

    <h1>Creër patient</h1>

    <hr>

    {!! Form::open(['action' => 'PatientsController@store', 'method' => 'POST']) !!}

        <div class="form-group">

            {{Form::label('name_P', 'patient naam:')}}

            {{Form::text('name_P', '', ['class' => 'form-control', 'placeholder' => 'patient naam'])}}

        </div>

        <div class="form-group">

            {{Form::label('species', 'Diersoort:')}} 
            
            {{Form::select('species', $data[1], null, ['class' => 'form-control', 'placeholder' => 'Kies een diersoort'])}}

            <a href={{ url('./species/create')}}><h4>+diersoort toevoegen</h4></a>
         
        </div>

        <div class="form-check">

            {{Form::label('gender', 'geslacht patient:')}}<br>

            {{form::radio('gender', 'Mannelijk')}}
            {{Form::label('gender', 'Mannelijk')}}<br>

            {{Form::radio('gender', 'Vrouwelijk')}}
            {{Form::label('gender', 'Vrouwelijk')}} 

        </div>

        <div class="form-group">

            {{Form::label('client', 'client:')}}

            {{Form::select('client', $data[0], null, ['class' => 'form-control', 'placeholder' => 'kies een client'])}}

            <a href={{ url('./clients/create')}}><h4>+client toevoegen</h4></a>

        </div>

        <div class="form-group">

            {{Form::label('status', 'patient status:')}}

            {{Form::textarea('status', '', ['class' => 'form-control', 'placeholder' => 'status van de patient'])}}
        </div>

        {{Form::submit('creëren', ['class' => 'btn btn-primary'])}}
       
        <a href={{ url('./patients')}} class="btn btn-danger">annuleren</a> 

    {!! Form::close() !!}

@endsection
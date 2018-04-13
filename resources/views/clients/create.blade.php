@extends('layouts.app')

@section('content')

    <h1>Creër een client</h1>

    <hr>

    {!!Form::open(['action' => 'ClientsController@store', 'method' => 'POST']) !!}

        <div class="form-group">

            {{Form::label('firstname_C', 'client voornaam:')}}

            {{Form::text('firstname_C', '', ['class' => 'form-control', 'placeholder' => 'Vooraam'])}}

        </div>

        <div class="form-group">

            {{Form::label('lastname_C', 'client achternaam:')}}

            {{Form::text('lastname_C', '', ['class' => 'form-control', 'placeholder' => 'Achternaam'])}}

        </div>

        <div class="form-group">

            {{Form::label('phone', 'Telefoon nummer:')}}

            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => '06-12345678'])}}

        </div>

        <div class="form-group">

            {{Form::label('email', 'Email van client')}}

            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'voorbeeld@voorbeeld.com'])}}

        </div>

        {{Form::submit('creëren', ['class' => 'btn btn-primary'])}}

        <a href="/Hospital/public/clients" class="btn btn-danger">annuleren</a> 

    {!!Form::close() !!}

@endsection
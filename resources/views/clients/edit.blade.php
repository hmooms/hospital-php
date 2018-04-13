@extends('layouts.app')

@section('content')

    <h1>Wijzig een client</h1>

    <hr>

    {!!Form::open(['action' => ['ClientsController@update', $client->client_id], 'method' => 'POST']) !!}

        <div class="form-group">

            {{Form::label('firstname_C', 'client voornaam:')}}

            {{Form::text('firstname_C', $client->client_firstname, ['class' => 'form-control', 'placeholder' => 'Vooraam'])}}

        </div>

        <div class="form-group">

            {{Form::label('lastname_C', 'client achternaam:')}}

            {{Form::text('lastname_C', $client->client_lastname, ['class' => 'form-control', 'placeholder' => 'Achternaam'])}}

        </div>

        <div class="form-group">

            {{Form::label('phone', 'Telefoon nummer:')}}

            {{Form::text('phone', $client->phone, ['class' => 'form-control', 'placeholder' => '06-12345678'])}}

        </div>

        <div class="form-group">

            {{Form::label('email', 'Email van client')}}

            {{Form::text('email', $client->email, ['class' => 'form-control', 'placeholder' => 'voorbeeld@voorbeeld.com'])}}

        </div>

        {{Form::hidden('_method', 'PUT')}}

        {{Form::submit('wijzigen', ['class' => 'btn btn-primary'])}}

        <a href="/Hospital/public/clients" class="btn btn-danger">annuleren</a> 

    {!!Form::close() !!}

@endsection
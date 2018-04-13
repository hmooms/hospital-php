@extends('layouts.app')

@section('content')

    <h1>Diersoort toevoegen</h1>

    <hr>

    {!! Form::open(['action' => 'SpeciesController@store', 'method' => 'POST']) !!}

        <div class="form-group">
            
            {{Form::label('species_D', 'Diersoort:')}}

            {{Form::text('species_D', '', ['class' => 'form-control', 'placeholder' => 'Diersoort'])}}    

        </div>
        
        {{Form::submit('toevoegen', ['class' => 'btn btn-primary'])}}

        <a href="/Hospital/public/species" class="btn btn-danger">annuleren</a>

    {!! Form::close() !!}

@endsection
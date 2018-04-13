@extends('layouts.app')

@section('content')

    <h1>Diersoort wijzigen</h1>

    <hr>

    {!! Form::open(['action' => ['SpeciesController@update', $species->species_id], 'method' => 'POST']) !!}

        <div class="form-group">
            
            {{Form::label('species_D', 'Diersoort:')}}

            {{Form::text('species_D', $species->species_description, ['class' => 'form-control', 'placeholder' => 'Diersoort'])}}    

        </div>

        {{Form::hidden('_method', 'PUT')}}
        
        {{Form::submit('wijzigen', ['class' => 'btn btn-primary'])}}

        <a href={{ url('./species')}} class="btn btn-danger">annuleren</a>

    {!! Form::close() !!}

@endsection
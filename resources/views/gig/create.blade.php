@extends('shared.layout')
@section('title', 'Add a new Gig')
@section('body')
    <div class="row">
        <div class="col-md-6">
        <h2>Create new Gig</h2>
        {{ Form::open(['route'=> 'gigs.store']) }}
            <div class="alert alert-info">All fields are <strong>required</strong>.</div>
            <br>
            <div class="form-group">
                {{ Form::label('Venue') }}
                {{ Form::text('venue', null, ['class'=> 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('Date') }}
                {{ Form::text('date', null, ['class'=> 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('Time') }}
                {{ Form::text('time', null, ['class'=> 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('Genre') }}
                {{ Form::select('genre_id', $genres, null, ['class'=> 'form-control']) }}
            </div>

            <input type="submit" value="Save" class="btn btn-primary" />
            <input type="button" value="Cancel" onclick="window.location.href='/'" class="btn btn-danger" />
        {{ Form::close() }}
        </div>
    </div>
@stop

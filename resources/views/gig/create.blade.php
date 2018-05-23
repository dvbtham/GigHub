@extends('shared.layout')
@section('title', 'Add a new Gig')
@section('body')
    <div class="row">
        <div class="col-md-8">
        <h2>Create new Gig</h2>
        {{ Form::open(['route'=> 'gigs.store', 'role'=> 'form']) }}
            <div class="alert alert-warning mb-0">All fields are <strong>required</strong>.</div>
            <br>
            <div class="form-group">
                {{ Form::label('Venue') }}
                {{ Form::text('venue', null, ['class'=> 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('Date') }}
                <div class='input-group date datetimepicker'>
                    {{ Form::text('date', null, ['class'=> 'form-control']) }}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('Description') }}
                {{ Form::textarea('description', null, ['class'=> 'form-control summernote']) }}
            </div>
            <div class="form-group">
                {{ Form::label('Genre') }}
                {{ Form::select('genre_id', $genres, null, ['class'=> 'form-control']) }}
            </div>

            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i>&nbsp; Save</button>
            <a href="{{ route('home') }}" class="btn btn-danger"><i class="glyphicon glyphicon-share-alt"></i>&nbsp; Cancel</a>

        {{ Form::close() }}
        </div>
    </div>
@stop

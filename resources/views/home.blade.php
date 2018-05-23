@extends('shared.layout')
@section('title', 'Trang chủ')

@section('body')
<h2>Upcoming Gigs</h2>
<div>
    {{ Form::open(['route'=> 'home', 'role'=> 'form', 'method'=>'get']) }}
        <div class='input-group'>
            {{ Form::text('q', null, ['class'=> 'form-control no-radius', 'placeholder'=> 'Enter gig, genre, atist...']) }}
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-search"></span>
            </span>
        </div>

    {{ Form::close() }}
</div>
@if($gigs->count() > 0)
@foreach($gigs as $gig)
<ul class="gigs voffset40">
    <li class="gig-item">
        <div class="date">
            <div class="month">
                {{ date('M', strtotime($gig->date)) }}
            </div>
            <div class="day">
                {{ date('d', strtotime($gig->date)) }}
            </div>
            <div class="time">
                    {{ date('H:i', strtotime($gig->date)) }}
                </div>
        </div>
        <div class="details">
            <div class="artist">
                <a class="" href="{{ route('home.showgig', $gig->id) }}">{{ $gig->title }}</a>
            </div>
            <div class="artist">
                <span class="label label-info">
                    <i class="glyphicon glyphicon-user fs-10"></i>&nbsp;{{ $gig->artist->name }}
                </span>
            </div>

            <div class="genre">
                <span class="label label-success">
                    <i class="glyphicon glyphicon-music fs-10"></i>&nbsp;{{ $gig->genre->name }}
                </span>
            </div>
            <div class="actions">
                <button data-following-id="{{ $gig->artist->id }}" class="btn btn-default btn-sm js-toggle-following">Follow</button>
                <button data-gig-id="{{ $gig->id }}" class="btn btn-default btn-sm js-toggle-attendance">Going?</button>
            </div>

        </div>
    </li>
    <li class="gig-line"></li>
</ul>
@endforeach
@else
    <div class="text-danger voffset10">No upcoming gigs found.</div>
@endif

@stop

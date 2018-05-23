@extends('shared.layout')
@section('title') {{ $gig->title }}
@endsection

@section('styles')
<link href="{{url ('css/comment.css')}}" rel="stylesheet" />
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $gig->title }}</h4>
                </div>
                <div class="panel-body">
                    <dl>
                        <dt>Artist</dt>
                        <dd><i class="fs-15 glyphicon glyphicon-user text-info"></i> {{ $gig->artist->name }}</dd>

                        <dt>Venue</dt>
                        <dd><i class="fs-15 glyphicon glyphicon-bookmark text-info"></i> {{ $gig->venue }}</dd>

                        <dt>Genre</dt>
                        <dd><i class="fs-15 glyphicon glyphicon-music text-info"></i> {{ $gig->genre->name }}</dd>

                        <dt>Date</dt>
                        <dd><i class="fs-15 glyphicon glyphicon-calendar text-info"></i> {{ date('d/m/Y',strtotime($gig->date)) }}</dd>

                        <dt>Time</dt>
                        <dd><i class="fs-15 glyphicon glyphicon-time text-info"></i> {{ date('H:i',strtotime($gig->date)) }}</dd>

                        <dt>Description</dt>
                        <dd>{!! $gig->description !!}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="comments-container">
            <h1>Comments</a></h1>
            {!! Form::open(['route' => 'comments.store', 'id' => 'comment-form', 'data-parsley-validate' => ""]) !!}
            {{ Form::hidden('id', $gig->id) }}
                <div class="my-alert"></div>
                    <div class="row">
                        @if(!\Auth::check())
                            <div class="col-md-6 is-remove">
                                <div class="form-group">
                                    {!! Form::label('Name') !!}
                                    {!! Form::text('fullname', null, ['class'=> 'form-control', 'id'=> 'name', 'required' => 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-6 is-remove">
                                <div class="form-group">
                                    {!! Form::label('Email') !!}
                                    {!! Form::email('email', null, ['class'=> 'form-control', 'id'=> 'email', 'required' => 'required']) !!}
                                </div>
                            </div>
                        @endif
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    {!! Form::label('Message') !!}
                                    {!! Form::textarea('comment', null, ['class'=> 'form-control', 'required' => 'required', 'rows' => '5', 'id'=> 'comment', 'minlength'=> 10]) !!}
                                </div>
                            </div>
                            <button type="submit" id="add-comment" class="btn btn-primary">Comment</button>
                        </div>
                    </div>
                {!! Form::close() !!}

            <ul class="media-list voffset20">
                @foreach($gig->parentComments as $item)
                    <li class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="/images/default-user.png" alt="">
                        </a>
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="glyphicon glyphicon-user"></i>{{ $item->name }}</li>
                                <li><i class="glyphicon glyphicon-time"></i> {{ date('H:i', strtotime($item->created_at)) }}</li>
                                <li><i class="glyphicon glyphicon-calendar"></i> {{ date('M d Y', strtotime($item->created_at)) }}</li>
                            </ul>
                            <p>{{ $item->comment }}</p>
                            <a data-repid="{{ $item->id }}" class="btn btn-primary reply" href="#"><i class="glyphicon glyphicon-share-alt"></i>Reply</a>
                            <br/>
                        </div>
                    </li>
                    @foreach($item->replies as $reply)
                    <li class="media second-media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="/images/default-user.png" alt="">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                        <li><i class="glyphicon glyphicon-user"></i>{{ $reply->name }}</li>
                                        <li><i class="glyphicon glyphicon-time"></i> {{ date('H:i', strtotime($reply->created_at)) }}</li>
                                        <li><i class="glyphicon glyphicon-calendar"></i> {{ date('M d Y', strtotime($reply->created_at)) }}</li>
                                </ul>
                                <p>{{ $reply->comment }}</p>
                                <a data-repid="{{ $item->id }}" class="btn btn-primary reply" href="#"><i class="glyphicon glyphicon-share-alt"></i> Reply</a>
                                <br/>
                            </div>
                        </li>
                    @endforeach

                @endforeach
                </ul>

        </div>
    </div>
</div>
<!-- Contenedor Principal -->

@stop

@section('scripts')
<script src="/js/comment.js"></script>
@stop

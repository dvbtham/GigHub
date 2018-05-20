@extends('shared.layout')
@section('title', 'Trang chủ')
@section('body')
<h2>My Upcoming Gigs</h2>
<ul class="gigs voffset40">
    <li class="gig-item">
        <div class="date">
            <div class="month">
                May
            </div>
            <div class="day">
                23
            </div>
        </div>
        <div class="details">
            <div class="artist">
                Thâm Davies
            </div>

            <div class="genre">
                Blues
            </div>
            <div class="actions-link">
                <i class="glyphicon glyphicon-edit fs-13 text-info"></i> <a href="">Edit</a>
                <i class="glyphicon glyphicon-trash fs-13 text-danger"></i> <a href="#" data-gig-id="" class="js-cancel-gig">Delete</a>
            </div>

        </div>
    </li>
    <li class="gig-line"></li>
</ul>

@stop

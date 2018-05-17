@extends('shared.layout')
@section('title', 'Trang chủ')

@section('body')
<h2>Upcoming Gigs</h2>
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
                <div class="actions">
                    <button data-following-id="81aaeb77-1997-4f39-b38d-5f77fd3f359b" class="btn btn-default btn-sm js-toggle-following hidden">Follow</button>
                    <button data-gig-id="4" class="btn btn-default btn-sm js-toggle-attendance">Going?</button>
                </div>

        </div>
    </li>
    <li class="gig-line"></li>
</ul>

@stop

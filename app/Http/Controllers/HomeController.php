<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gig;

class HomeController extends Controller
{
    function upcomings()
    {
        $gigs = Gig::where('date', '>=', date('Y-m-d hh:mm:ii'));
        return view('home', compact('gigs'));
    }
}

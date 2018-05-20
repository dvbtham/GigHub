<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gig;

class HomeController extends Controller
{
    function upcomings()
    {
        $users = \App\Models\User::with('roles')->get();
        //$users = \App\Models\User::all();

        foreach ($users as $user) {
            $user->roles->first()->name;
        }

        $gigs = Gig::where('date', '>=', date('Y-m-d hh:mm:ii'));
        return view('home', compact('gigs'));
    }
}

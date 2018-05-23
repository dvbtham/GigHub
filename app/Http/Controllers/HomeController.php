<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Models\Gig;

class HomeController extends Controller
{
    function upcomings()
    {
        // $users = \App\Models\User::with('roles')->get();
        //$users = \App\Models\User::all();

        // foreach ($users as $user) {
        //     $user->roles->first()->name;
        // }
        $term = Request::get('q');
        $gigs = Gig::search($term);
        return view('home', compact('gigs'));
    }

    public function show($id)
    {
        $gig = Gig::findOrFail($id);
        return view('gig.detail', compact('gig'));
    }
}

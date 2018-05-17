<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GigsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $genres = Genre::pluck('name', 'id');
        return view('gig.create', compact('genres'));
    }
}

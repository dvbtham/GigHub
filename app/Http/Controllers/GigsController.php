<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Gig;
use Auth;
class GigsController extends Controller
{
    public function index()
    {
    }

    public function mine()
    {
        $gigs = Gig::where('artist_id', Auth::user()->id)->orderBy('date');
        return view('gig.mine', compact('gigs'));
    }

    public function create()
    {
        $genres = Genre::pluck('name', 'id');
        return view('gig.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $genres = Genre::pluck('name', 'id');
        return view('gig.create', compact('genres'));
    }

    public function show($id)
    {
        $genres = Genre::pluck('name', 'id');
        return view('gig.edit', compact('genres'));
    }

    public function edit($id)
    {
        $genres = Genre::pluck('name', 'id');
        return view('gig.edit', compact('genres'));
    }

    public function update(Request $request)
    {
        $genres = Genre::pluck('name', 'id');
        return view('gig.create', compact('genres'));
    }

    public function destroy($id)
    {
        try {
            $gig = Gig::findOrFail($id);
            $gig->delete();
            return redrect()->json();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

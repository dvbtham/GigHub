<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GigFormRequest;
use App\Models\Genre;
use App\Models\Gig;
use Auth;
use Carbon\Carbon;

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

    public function store(GigFormRequest $request)
    {
        try {
            $gig = new Gig([
                'venue' => $request->venue,
                'date' => Carbon::createFromFormat('d/m/Y H:i', $request->date),
                'description' => $request->description,
                'genre_id' => $request->genre_id,
                'artist_id' => Auth::user()->id,
                'is_canceled' => false
            ]);

            $gig->save();

            \Session::flash('success', 'Gig was successfully added.');

            return redirect()->back();
        }
        catch(\Illuminate\Database\QueryException $ex) {
            return redirect()->back();
        }

    }

    public function show($id)
    {
        $gig = Gig::findOrFail($id);
        return view('gig.detail', compact('gig'));
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gig extends NoTimeStampModel
{
    protected $fillable = ['venue', 'date', 'description', 'artist_id', 'genre_id', 'is_canceled'];

    public function attendences()
    {
        return $this->hasMany('App\Models\Attendence', 'gig_id');
    }

    public function artist()
    {
        return $this->belongsTo('App\Models\User', 'artist_id', 'id');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function parentComments()
    {
        return $this->comments()->where('reply_id', null)->where('approved', true);
    }

    public static function search($term)
    {
        if(isset($term)) {
            $gigs = Gig::with(['artist', 'genre'])->whereHas('artist', function ($query) use ($term) {
                $query->where('name', 'like', '%'. $term . '%')
                ->where('date', '>=', date('Y-m-d'));

                })->orWhereHas('genre', function ($query) use ($term) {
                    $query->where('name', 'like', '%'. $term . '%');                                                                                    ///////////
                })
                ->orWhere('title', 'like', '%'. $term . '%')
                ->orWhere('venue', 'like', '%'. $term . '%')
                ->orWhere('description', 'like', '%'. $term . '%')
                ->where('date', '>=', date('Y-m-d'))->orderBy('date', 'desc')->get();
            return $gigs;
        }
        else return  Gig::with(['artist', 'genre'])->where('date', '>=', date('Y-m-d'))->get();
    }
}

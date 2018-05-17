<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gig extends NoTimeStampModel
{
    protected $fillable = ['venue', 'date', 'artist_id', 'genre_id', 'is_canceled'];

    public function attendences()
    {
        return $this->hasMany('App\Model\Attendence', 'gig_id');
    }

    public function artist()
    {
        return $this->belongsTo('App\Model\User', 'artist_id', 'id');
    }

    public function genre()
    {
        return $this->belongsTo('App\Model\Genre');
    }
}

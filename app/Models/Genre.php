<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends NoTimeStampModel
{
    protected $fillable = ['name'];

    public function gigs()
    {
        return $this->hasMany('App\Model\Gig');
    }
}

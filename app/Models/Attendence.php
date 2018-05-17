<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendence extends NoTimeStampModel
{
    protected $fillable = ['gig_id', 'attendee_id', 'is_canceled'];

    public function gig()
    {
        return $this->belongsTo('App\Models\Gig','gig_id', 'id');
    }

    public function attendee()
    {
        return $this->belongsTo('App\Models\User','attendee_id', 'id');
    }
}

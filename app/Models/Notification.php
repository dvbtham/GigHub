<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends NoTimeStampModel
{
    protected $fillable = ['type', 'datetime', 'original_datetime', 'original_venue', 'gig_id'];

    public function gig()
    {
        return $this->belongsTo('App\Models\Gig','gig_id', 'id');
    }
}

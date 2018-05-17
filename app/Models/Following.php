<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Following extends NoTimeStampModel
{
    protected $fillable = ['follower_id', 'followee_id', 'is_canceled'];

    public function follower()
    {
        return $this->belongsTo('App\Models\User','follower_id', 'id');
    }

    public function followee()
    {
        return $this->belongsTo('App\Models\User','followee_id', 'id');
    }
}

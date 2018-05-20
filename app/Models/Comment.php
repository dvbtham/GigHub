<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'comment', 'approved', 'gig_id'];

    public function gig()
    {
        return $this->belongsTo('App\Models\Gig');
    }
}

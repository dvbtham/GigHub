<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'comment', 'approved', 'reply_id', 'gig_id', 'created_at', 'updated_at'];

    public function gig()
    {
        return $this->belongsTo('App\Models\Gig');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Comment', 'reply_id');
    }
}

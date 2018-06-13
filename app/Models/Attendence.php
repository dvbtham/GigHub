<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendence extends NoTimeStampModel
{
    public $incrementing = false;

    protected $fillable = ['gig_id', 'attendee_id', 'is_canceled'];

    protected $primaryKey = ['gig_id', 'attendee_id'];

    public function gig()
    {
        return $this->belongsTo('App\Models\Gig','gig_id', 'id');
    }

    public function attendee()
    {
        return $this->belongsTo('App\Models\User','attendee_id', 'id');
    }

    protected function setKeysForSaveQuery(\Illuminate\Database\Eloquent\Builder $query)
    {
        if (is_array($this->primaryKey)) {
            foreach ($this->primaryKey as $pk) {
                $query->where($pk, '=', $this->original[$pk]);
            }
            return $query;
        } else {
            return parent::setKeysForSaveQuery($query);
        }
    }
}

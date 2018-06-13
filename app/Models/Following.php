<?php

namespace App\Models;

class Following extends NoTimeStampModel
{
    public $incrementing = false;

    protected $primaryKey = ['follower_id', 'followee_id'];

    protected $fillable = ['follower_id', 'followee_id', 'is_canceled'];

    /**
     * Set the keys for a save update query.
     * This is a fix for tables with composite keys
     * TODO: Investigate this later on
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
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

    public function follower()
    {
        return $this->belongsTo('App\Models\User', 'follower_id', 'id');
    }

    public function followee()
    {
        return $this->belongsTo('App\Models\User', 'followee_id', 'id');
    }
}

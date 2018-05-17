<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends NoTimeStampModel
{
    protected $fillable = ['user_id', 'notification_id', 'is_read'];

    public function notification()
    {
        return $this->belongsTo('App\Model\Notification');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}

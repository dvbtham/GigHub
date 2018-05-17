<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends NoTimeStampModel
{
    protected $fillable = ['user_id', 'role_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoTimeStampModel extends Model
{
    public $timestamps = false;
}

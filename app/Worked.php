<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worked extends Model
{
    public function session()
    {
        return $this->belongsTo('App\WorkedSession', 'id', 'session_id');
    }
}

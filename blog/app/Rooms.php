<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table ='rooms';
     public function information()
    {
        return $this->hasMany('App\Information');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

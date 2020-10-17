<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

	protected $table ='bills';
    public function informations()
    {
        return $this->belongsToMany('App\Information')->withTimestamps();
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

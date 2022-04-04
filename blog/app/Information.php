<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{

	protected $table ='information';
    public $primaryKey = 'id';
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    
}

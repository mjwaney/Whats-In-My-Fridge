<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    public $fillable = ['name','category'];

    public function recipes()
    {
    	return $this->belongsToMany('App\Recipe')
      		->withTimestamps();
    }

    public function users()
    {
    	return $this->belongsToMany('App\User')
      		->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
|-----------------------------------------------------------------------------------------
| Ingredient model, many to many relationship with both Recipe and User Model
|-----------------------------------------------------------------------------------------
*/

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
      		->withTimestamps()
                            ->withPivot('expiration_date'); //add pivot row for Ingredient - User relations
    }
}

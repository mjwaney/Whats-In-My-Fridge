<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;

/*
|----------------------------------------------------------------------------------------------------------
| Reciope Model: Many to many relationship with Ingredient
|----------------------------------------------------------------------------------------------------------
*/

class Recipe extends Model
{
    use Favoriteable;
    
    public $fillable = ['name', 'author', 'kitchen', 'type', 'serving_size', 'date_added', 'time_needed', 'difficulty', 'instructions'];

    public function ingredients()
    {
    	return $this->belongsToMany('App\ingredient')
      		->withTimestamps();
    }
}

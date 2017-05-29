<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;

/*
|----------------------------------------------------------------------------------------------------------
| User Model one to one relationship with SocialLoginProfile, many to many with Ingredient
|----------------------------------------------------------------------------------------------------------
*/

class User extends Authenticatable
{
    use Notifiable;
    use Favoriteability;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_toke', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socialProfile()
    {
        return $this->hasOne(SocialLoginProfile::class);
    }
    
    // Set the verified status to true and make the email token null
    public function verified()
    {
        $this->verified = 1;
        $this->email_token = null;
        $this->save();
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\ingredient')
            ->withTimestamps()
                ->withPivot('expiration_date');//add pivot row for Ingredient - User relations
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'file_number', 'first_name', 'middle_name', 'surname', 'date_of_birth', 'nationality', 'country', 'gender', 'graduation_degree','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];
    public function photos()
    {
        return $this->hasMany('App\UserPhotos');
    }
/*
    protected static function boot(){
        parent::boot();
        static::deleting(function($user) {
             $user->photos()->delete();
        }
    }*/
}

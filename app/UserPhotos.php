<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhotos extends Model
{
	// array store the data that is stored in database
    protected $fillable = ['user_id', 'filename', 'type'];
    
    // proberty to add relation 
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

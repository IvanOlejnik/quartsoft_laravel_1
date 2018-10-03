<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    protected $fillable = [
        'id', 'title', 'user_id',
    ];
	
	  public function user()
    {
        return $this->belongsTo('App\User');
    }
}

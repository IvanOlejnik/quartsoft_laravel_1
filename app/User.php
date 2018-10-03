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
        'id', 'name', 'email', 'phone', 'work', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	 public static function hasRole($id) {
		//return $this->hasMany('App\Models\Roles');
		//$user = $this->find($id);
		$user = new User;
		$user = $user->find($id);
		if($user->role == 'admin'){
			return true;
		}
		return false;
	}
	
	  public function instrument()
    {
        return $this->hasMany('App\Instrument');
    }
}

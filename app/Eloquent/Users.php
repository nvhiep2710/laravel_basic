<?php

namespace App\Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
	use Notifiable;
	protected $table = "users";
	protected $fillable = [
		'name',
		'email',	
		'password',
		'active',
	];
	public $timestamps = false;
	protected $hidden = [
		'password', 'remember_token',
	];
	protected $casts = [
        'email_verified_at' => 'datetime',
	];
}

<?php

namespace App\Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Students extends Authenticatable
{
	use Notifiable;
	protected $table = "students";
	protected $fillable = [
		'first_name',
		'last_name',
		'email',	
		'password',
		'api_token',
		'address',
		'phone',
		'avatar',
		'dob',
	];
	public $timestamps = false;
	protected $hidden = [
		'password','created_at','updated_at','remember_token',
		'active'
	];

	public function tokens () {
		return $this->hasMany('App\Eloquent\StudentToken', 'id_student', 'id');
	}

	public function registercourse(){
		return $this->belongsTo('App\Eloquent\RegisterCourse','id_student');
	}
}

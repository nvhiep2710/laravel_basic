<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class RegisterCourse extends Model
{
    //
	protected $table = "register_courses";

	protected $fillable = [
		'id_student',
		'id_course',
		'id_classes',
	];
	public function course(){
		return $this->belongsTo('App\Eloquent\Course','id_course');
	}
	public function student(){
		return $this->belongsTo('App\Eloquent\Students','id_student');
	}
	public function classes(){
		return $this->belongsTo('App\Eloquent\Classes','id_classes');
	}
}

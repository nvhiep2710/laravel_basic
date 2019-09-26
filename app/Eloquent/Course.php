<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = "courses";
    
	protected $fillable = [
		'course_code',
		'course_name',
	];
	protected $hidden = [
		'created_at','updated_at'
	];
	public $timestamps = false;

	public function classes(){
		return $this->hasMany('App\Eloquent\Classes','id_course');
	}
}

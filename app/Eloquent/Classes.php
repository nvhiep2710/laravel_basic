<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    protected $table = "classes";
    
	protected $fillable = [
		'class_code',
		'class_name',
		'start_date',
		'end_date',
		'schedule',
		'id_course',
		'description',
	];
	public $timestamps = false;
	public function course(){
		return $this->belongsTo('App\Eloquent\Course','id_course');
	}
}

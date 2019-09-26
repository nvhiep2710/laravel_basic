<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class StudentToken extends Model
{
	//student token login
	protected $table = "students_token";
	
    protected $fillable = [
        'id_student','access_token',
    ];
    public $timestamps = false;
    
    public function user () {
		return $this->belongsTo('App\Eloquent\Students', 'id_student', 'id');
	}
}

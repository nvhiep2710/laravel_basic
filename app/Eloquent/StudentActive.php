<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class StudentActive extends Model
{
	//student register
	protected $table = "students_activations";
	
    protected $fillable = [
        'id_student','token',
    ];
}

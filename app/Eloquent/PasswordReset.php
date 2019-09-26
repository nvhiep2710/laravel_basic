<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
	//Student reset password
    protected $table = "password_resets";
	
    protected $fillable = [
        'email', 'token',
    ];
}

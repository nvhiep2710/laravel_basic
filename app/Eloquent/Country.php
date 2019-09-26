<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = "apps_countries";
    
	protected $fillable = [
		'id',
		'country_code',
		'country_name',
	];
	public $timestamps = false;

}

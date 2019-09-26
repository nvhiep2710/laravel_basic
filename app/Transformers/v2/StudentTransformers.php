<?php
namespace App\Transformers\v2;

use App\Eloquent\Students;
use League\Fractal\TransformerAbstract;

class StudentTransformers extends TransformerAbstract
{
	public function transform(Students $student)
	{
		return [
			'first_name' => $student->first_name,
			'last_name' => $student->last_name,
			'email' => $student->email,
		];
	}
}
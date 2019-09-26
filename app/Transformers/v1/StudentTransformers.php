<?php
namespace App\Transformers\v1;

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
			'address' => $student->address,
			'phone' => $student->phone,
			'avatar' => $student->avatar,
			'DOB' => $student->DOB,
		];
	}
}
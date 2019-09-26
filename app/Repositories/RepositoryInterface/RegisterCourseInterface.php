<?php

namespace App\Repositories\RepositoryInterface;
use App\Eloquent\RegisterCourse;
use App\Repositories\BaseRepositoryInterface;

interface RegisterCourseInterface extends BaseRepositoryInterface
{
	public function getallinfo();
	public function getbyIdStudent($id);
}

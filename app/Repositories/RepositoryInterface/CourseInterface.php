<?php

namespace App\Repositories\RepositoryInterface;
use App\Eloquent\Cource;
use App\Repositories\BaseRepositoryInterface;

interface CourseInterface extends BaseRepositoryInterface{
	public function getclass($id);
}

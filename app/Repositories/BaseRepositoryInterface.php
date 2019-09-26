<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
	public function getall();
	public function getallpagigate();
	public function getbyId($id);
	public function create(array $data);
	public function update($id, array $data);
	public function delete($id);
	public function paginate($limit, array $columns = ['*'], $pageName = 'page', $page);
}

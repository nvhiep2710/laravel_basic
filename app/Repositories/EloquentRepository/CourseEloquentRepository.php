<?php
namespace App\Repositories\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\CourseInterface;
use App\Eloquent\Course;

class CourseEloquentRepository extends BaseRepository implements CourseInterface
{
    protected $model;
    public function __construct(Course $model)
    {
       parent::__construct($model);
       $this->model = $model;
    }
    public function getclass($id){
    	return $this->model->find($id)->classes()->get();
    }
}
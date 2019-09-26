<?php
namespace App\Repositories\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\ClassInterface;
use Illuminate\Support\Carbon;
use App\Eloquent\Classes;

class ClassEloquentRepository extends BaseRepository implements ClassInterface
{
    protected $model;
    public function __construct(Classes $model)
    {
       parent::__construct($model);
       $this->model = $model;
    }
    public function getcourse(){
    	return $this->model->course()->get();
    }
}
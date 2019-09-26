<?php
namespace App\Repositories\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\StudentInterface;
use Illuminate\Support\Carbon;
use App\Eloquent\Students;

class StudentEloquentRepository extends BaseRepository implements StudentInterface
{
    public function __construct(Students $model)
    {
       parent::__construct($model);
    }
    public function getbyEmail($email){
        return $this->model->where('email',$email)->first();
    }
    
}
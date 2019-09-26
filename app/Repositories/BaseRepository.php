<?php 
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{  
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getall(){
        return $this->model->all();
    }
    public function getallpagigate(){
        return $this->model->orderBy('id','desc')->paginate(10);
    }
    public function getbyId($id){
        return $this->model->find($id);
    }
    public function create(array $data){
        return $this->model->create($data);
    }
    public function update($id, array $data){
        $todo = $this->model->find($id);
        $todo->update($data);
        return $todo;
    }    
    public function delete($id){
        $this->getbyId($id)->delete();
        return true;
    }
    public function paginate($limit = 10, array $columns = ['*'], $pageName = 'page', $page = null)
    {
        return $this->model->paginate($limit, $columns, $pageName, $page);
    }
}
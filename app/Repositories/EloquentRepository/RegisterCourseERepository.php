<?php
namespace App\Repositories\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\RegisterCourseInterface;
use Illuminate\Support\Carbon;
use App\Eloquent\RegisterCourse;
use DB;

class RegisterCourseERepository extends BaseRepository implements RegisterCourseInterface
{
	public function __construct(RegisterCourse $model)
	{
		parent::__construct($model);
	}
	public function getbyIdStudent($id){
        return $this->model->where('id_student',$id)->get();
    }
	public function getallinfo(){
		return DB::table('register_courses')->join('students','students.id','=','register_courses.id_student')->join('courses','courses.id','=','register_courses.id_course')->join('classes','classes.id','=','register_courses.id_classes')->paginate(10);
	}
}
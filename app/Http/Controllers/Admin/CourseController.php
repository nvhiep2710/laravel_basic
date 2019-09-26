<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\CourseRequest;
use App\Repositories\EloquentRepository\CourseEloquentRepository;
use App\Eloquent\Course;
use App\Eloquent\Classes;

class CourseController extends Controller
{
    protected $course;
    public function __construct(CourseEloquentRepository $course)
    {
        $this->course = $course;
    }
    public function index()
    {
        $listcourse = $this->course->getallpagigate();
        return view('admin.course.index', compact('listcourse'));
    }
    public function show($id)
    {
        $listclass = $this->course->getclass($id)->toArray();
        echo '<pre>';
        print_r($listclass);
        echo '<pre>';
    }
    public function create()
    {
        return view('admin.course.insert');
    }

    public function store(CourseRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $this->course->create($data);
        return redirect()->route('course.index');
    }

    public function edit($id)
    {
        $getrow = $this->course->getbyId($id);
        return view('admin.course.update', compact('getrow'));
    }

    public function update(CourseRequest $request, $id)
    {
        $data = $request->only(array_keys($request->rules()));
        $this->course->update($id,$data);
        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $check_class = Classes::where('id_course',$id)->count();
        if($check_class == 0){
            $this->course->delete($id);
            return redirect()->back()->withErrors(['mgss'=>"Xóa khóa học thành công !!"])->withInput();
        }else{
            return redirect()->back()->withErrors(['mgse'=>"Xóa khóa học thất bại vì trong khóa học còn tồn tại lớp học"])->withInput();
        }
    }
}

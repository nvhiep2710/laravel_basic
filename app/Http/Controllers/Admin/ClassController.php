<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EloquentRepository\ClassEloquentRepository;
use App\Repositories\EloquentRepository\CourseEloquentRepository;
use App\Eloquent\Classes;
use App\Eloquent\Course;
use App\Http\Requests\AdminRequest\ClassRequest;

class ClassController extends Controller
{
    protected $class;
    protected $course;
    public function __construct(ClassEloquentRepository $class, CourseEloquentRepository $course)
    {
       $this->class = $class;
       $this->course = $course;
    }
    public function index()
    {
        $listclass = $this->class->getallpagigate();
        $listcourse = $this->course->getall();
        $viewData =[
            'listclass' => $listclass,
            'listcourse' => $listcourse,
        ];
        return view('admin.class.index',$viewData);
    }
    public function create()
    {
        $listcourse = $this->course->getall();
        return view('admin.class.insert',compact('listcourse'));
    }

    public function store(ClassRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $this->class->create($data);
        return redirect()->route('class.index');
    }

    public function edit($id)
    {
        $getrow = $this->class->getbyId($id);
        $listcourse = $this->course->getall();
        $viewData =[
            'getrow' => $getrow,
            'listcourse' => $listcourse,
        ];
        return view('admin.class.update',$viewData);
    }

    public function update(ClassRequest $request, $id)
    {
        $data = $request->only(array_keys($request->rules()));
        $this->class->update($id,$data);
        return redirect()->route('class.index');
    }

    public function destroy($id)
    {
        $this->class->delete($id);
        return redirect()->route('class.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EloquentRepository\StudentEloquentRepository;
use App\Transformer\StudentTransformer;

class StudentController extends Controller
{
    protected $student;
    public function __construct(StudentEloquentRepository $student)
    {
        $this->student = $student;
        //$this->studentTransform = $studentTransform;
    }
    
    public function index()
    {
        $liststudent = $this->student->getallpagigate();
        return view('admin.student.index', compact('liststudent'));
    }
}

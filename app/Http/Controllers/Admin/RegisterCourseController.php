<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EloquentRepository\RegisterCourseERepository;
use App\Eloquent\Course;

class RegisterCourseController extends Controller
{
     protected $registercourse;
    public function __construct(RegisterCourseERepository $registercourse)
    {
       $this->registercourse = $registercourse;
    }

    public function index()
    {
        $listregistercourse = $this->registercourse->getallinfo();
        return view('admin.registercourse.index', compact('listregistercourse'));
    }
}

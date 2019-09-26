<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\EloquentRepository\RegisterCourseERepository;
use App\Http\Resources\v1\RegisterCourse\RegisterCourseResource;
use Auth;
use Hash;

class RegisterCourseController extends Controller
{
    protected $registercourse;
    public function __construct(RegisterCourseERepository $registercourse)
    {
     $this->registercourse = $registercourse;
 }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RegisterCourseResource::collection($this->registercourse->paginate($request->per_page,['*'],'page',$request->page));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\responsese
     */
    
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = \Validator::make($request->all(), [
            'id_course' => 'required',
            'id_classes' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        foreach ($check as $row) {
            if($request->id_course == $row->id_course)
                return response()->json([
                    'status'=>'error',
                    'message'=>'You have already joined a class in this course already']);
        }
        $array = [
            'id_student' => $user->id,
            'id_course' => $request->id_course,
            'id_classes' => $request->id_classes,
        ];
        $data = $this->registercourse->create($array);
        return response()->json([
            'status'=>'success',
            'message' => 'Register the Course Success!',$data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

    }
}

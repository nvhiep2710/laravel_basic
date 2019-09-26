<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EloquentRepository\StudentEloquentRepository;
use App\Eloquent\RegisterCourse;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\v1\Student\StudentCollection;
use App\Http\Resources\v1\Student\StudentResource;
use App\Http\Resources\v1\RegisterCourse\RegisterCourseCollection;
use App\Http\Resources\v1\RegisterCourse\RegisterCourseResource;
use App\Http\Requests\ApiRequest\UpdateProfileStudent;
use Auth;
use Hash;

class StudentController extends Controller
{
    protected $student;
    public function __construct(StudentEloquentRepository $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new StudentCollection($this->student->paginate($request->per_page,['*'],'page',$request->page));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return response()->json(new StudentResource(Auth::user()), 201);
    }

    
    public function show_register_list(Request $request)
    {
        $courses = RegisterCourse::where('id_student',Auth::id())->get();
        return RegisterCourseResource::collection($courses);
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
        $user = Auth::user();
        $validator = \Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'string',
            'phone' => 'string',
            'avatar' => 'mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $get_image = $request->file('avatar');
        
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.time().'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/student',$new_image);
            $user->avatar = $new_image;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return response()->json([
            'status'=>'success',
            'message'=>'Update profile success',$user], 201);
    }


    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $validator = \Validator::make($request->all(), [
           'password_current' => 'required',
           'password' => 'required|confirmed|min:6',
           'password_confirmation' => 'required'
       ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (!Hash::check($request->password_current, $user->password)) {
            return response()->json(['errors' => ['message'=> ['Current password does not match']]], 422);
        }
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['status'=>'success',
            'message'=>'Update password success',$user], 201);
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

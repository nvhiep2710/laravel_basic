<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\RegisterActiveRequest;
use App\Repositories\EloquentRepository\StudentEloquentRepository;
use Carbon\Carbon;
use App\Eloquent\StudentActive;
use App\Eloquent\StudentToken;
use Auth;

class AuthController extends Controller
{
	private $apiToken;
	protected $student;
	public function __construct(StudentEloquentRepository $student)
	{
    // Unique Token
		$this->apiToken = uniqid(base64_encode(str_random(60)));
		$this->student = $student;
	}

	//register student
	public function register(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'email' => 'required|string|email|unique:students|max:255',
			'password' => 'required|min:6|confirmed',
			'address' => 'required|string',
		]);
		if ($validator->fails()) {
			return response()->json($validator->errors(), 422);
		}

		$user = $this->student->create([
			'first_name' => $request['first_name'],
			'last_name' => $request['last_name'],
			'email' => $request['email'],
			'password' =>bcrypt($request['password']),
			'address' => $request['address'],
			'api_token' => '',
			'avatar' => 'avatar.png',
		]);

		$user['link'] = str_random(50);
		StudentActive::insert(['id_student'=>$user['id'],'token'=>$user['link']]);

		$user->notify(new RegisterActiveRequest($user['link']) );

		return response()->json(['status'=>'success','message'=>'We have e-mailed your active account. please check mail!',$user], 201);
	}

	//login student
	public function login(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'email'=>'required|email',
			'password'=>'required|min:6'
		]);
		if ($validator->fails()) {
			return response()->json($validator->errors(), 422);
		}
		$user = $this->student->getbyEmail($request->email);
		if($user && $user->active == 1 ) {
			if(password_verify($request->password, $user->password) ) {
				$table_token = StudentToken::create([
					'id_student' => $user->id,
					'access_token' => $this->apiToken
				]);

				$this->student->update($user->id,['api_token' => $this->apiToken]);

				if($table_token) {
					return response()->json([
						'first_name' => $user->first_name,
						'last_name' => $user->last_name,
						'email'        => $user->email,
						'access_token' => $this->apiToken,
					]);
				}
			} else 
			return response()->json(['message' => 'Invalid Password']);
		} else 
		return response()->json(['message' => 'User not found',]);
	}


	//active student
	public function active_account($code)
	{
		$check = StudentActive::where('token',$code)->first();
		if(!is_null($check))
		{ 
			$this->student->update($check->id,['active' => 1]);
			StudentActive::where('token',$code)->delete();
			return response()->json([
				'status'=>'success',
				'message'=>'Account is actived!'],
				201);
		}
		return response()->json([
			'status'=>'error',
			'message'=>'your token is invalid'],
			200);
	}

	// logout
	public function logout(Request $request)
	{
		if (Auth::check()) {
			$this->student->update(Auth::id(),['api_token' => '']);
			StudentToken::where('id_student',Auth::id())->delete();
			return response()->json([
				'status'=>'success',
				'message' => 'User Logged Out',
			]);
		}
	}
}

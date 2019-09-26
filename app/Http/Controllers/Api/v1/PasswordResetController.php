<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\Repositories\EloquentRepository\StudentEloquentRepository;
use App\Eloquent\PasswordReset;

class PasswordResetController extends Controller
{
    protected $student; 
    public function __construct(StudentEloquentRepository $student)
    {
        $this->student = $student;
    }
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function form_reset()
    {
        return view('form-password');
    }
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|max:255|email'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = $this->student->getbyEmail($request->email);
        if (!$user)
            return response()->json([
                'message' => "We can't find a user with that e-mail address."
            ], 404);

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email, ],
            [ 'email' => $user->email,'token' => str_random(60),]
        );

        if ($user && $passwordReset)
            $user->notify(new PasswordResetRequest($passwordReset->token));
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }

    public function reset(Request $request)
    {
        $passwordReset = PasswordReset::where('token', $request->token)->first();

        if (!$passwordReset)
            return response()->json(['status'=>'error',
                'message' => 'This password reset token is invalid.'], 404);

        $validator = \Validator::make($request->all(), [
           'password' => 'required|confirmed',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $user = $this->student->getbyEmail($passwordReset->email);
        
        if (!$user)
            return response()->json(['status'=>'error',
                'message' => "We can't find a user with that e-mail address."], 404);
        
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        return response()->json(['status'=>'success','message'=>'Reset password success'], 201);
    }
}
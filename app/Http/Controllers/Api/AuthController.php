<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CodeVerificationRequest;
use App\Traits\ApiResponse;
use App\Http\Requests\ResendCodeRequest;
use App\Http\Resources\UserResource;

use App\Models\User; 

class AuthController extends Controller
{
    use ApiResponse;

    public function register(RegisterRequest $request)
    {
       $user = User::create($request->validated() + ['type' => 'user']);
       return $this->successResponse(new UserResource($user), __('auth.register_success'), 201);
    }

   public function login(LoginRequest $request) 
{
    $user = User::where('phone', $request->phone)->first();

    if (!$user) {
           return $this->errorResponse(__('auth.phone_not_found'), 404);

    }
     
    // $user->sendCode();


    $user->code = rand(1111, 9999);


$user->code_expires_at = now()->addMinutes(15);

$user->save();
    return $this->codeSentResponse(__('auth.code_sent'));
}


public function codeVerification(CodeVerificationRequest $request)
{
    $user = User::where('phone', $request->phone)
        ->where('code', $request->code)
        ->where('code_expires_at', '>=', now())
        ->first();

    if (!$user) {
        return $this->errorResponse(__('auth.invalid_or_expired_code'), 400);
    }

    $user->update([
        'code' => null,
        'code_expires_at' => null
    ]);

    $token = $user->createToken('authToken')->accessToken;

      return $this->successResponse([
         'data' => [
        'token' => $token,
        'user' => new UserResource($user),
    ]
    ], __('auth.verified_success'), 200);

}

public function resendCode(ResendCodeRequest $request)
{
    $user = User::where('phone', $request->phone)->first();

    if (!$user) {
        return $this->errorResponse(__('auth.user_not_found'), 404);
    }

    $user->sendCode();
    return $this->codeSentResponse(__('auth.code_resent'));

}

}
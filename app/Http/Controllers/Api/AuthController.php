<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CodeVerificationRequest;
use App\Traits\ApiResponse;
use App\Http\Requests\ResendCodeRequest;

use App\Models\User; 

class AuthController extends Controller
{
    use ApiResponse;

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated() + ['type' => 'client']);
    return $this->successResponse($user, __('auth.register_success'), 201);
    }

   public function login(LoginRequest $request) 
{
    $user = User::where('phone', $request->phone)->first();

    if (!$user) {
        return $this->errorResponse('هذا الرقم غير مسجل لدينا', 404);
    }
     
    // $user->sendCode();


    $user->code = rand(1111, 9999);


$user->code_expires_at = now()->addMinutes(15);

$user->save();
    return $this->codeSentResponse('تم إرسال كود التحقق بنجاح');
}


public function codeVerification(CodeVerificationRequest $request)
{
    $user = User::where('phone', $request->phone)
        ->where('code', $request->code)
        ->where('code_expires_at', '>=', now())
        ->first();

    if (!$user) {
        return $this->errorResponse('الكود غير صحيح أو منتهي الصلاحية', 400);
    }

    $user->update([
        'code' => null,
        'code_expires_at' => null
    ]);

    $token = $user->createToken('authToken')->accessToken;

    return $this->successResponse([
        'user' => $user,
        'token' => $token
    ], 'تم التحقق من البيانات بنجاح', 200);
}

public function resendCode(ResendCodeRequest $request)
{
    $user = User::where('phone', $request->phone)->first();

    if (!$user) {
        return $this->errorResponse('المستخدم غير موجود', 404);
    }

    $user->sendCode();
        return $this->codeSentResponse('تم إعادة إرسال كود التحقق بنجاح');

}

}
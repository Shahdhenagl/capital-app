<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ResendCodeController;
use App\Http\Controllers\Api\OrderController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



//auth 

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/code/resend', [AuthController::class,'resendCode']);

Route::post('/code/verify',[AuthController::class,'codeVerification']);


//order



// Route::middleware('auth:api')->group(function () {
    
//     Route::post('/create/order', [OrderController::class, 'createOrder']);
    
//     // أي راوتس تانية محتاجة حماية بـ Passport بتتحط هنا
// });


// جرب تكتبها كدة بالظبط وتأكد إنك جوه api.php
Route::post('/create/order', [OrderController::class, 'createOrder'])->middleware('auth:api');
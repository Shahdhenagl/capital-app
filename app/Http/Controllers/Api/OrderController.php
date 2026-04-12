<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Traits\ApiResponse;
use App\Models\ElevatorUser;

class OrderController extends Controller
{

 use ApiResponse;
    public function createOrder( CreateOrderRequest $request)
    {
        $data = $request->validated();

    $elevatorUser = ElevatorUser::find($data['elevator_user_id']);

    $data['user_id'] = $elevatorUser?->user_id;

    $order = Order::create($data);

    return $this->successResponse($order, 'تم انشاء طلب بنجاح', 201);
        
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\AssignTechnicianRequest;
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



    public function managerOrder()
    {
        $user = auth()->user();
        if($user->type !== 'manager')
            {
               return $this->errorResponse('غير مسموح لك بالدخول', $code = 400);
            }
       $orders=Order::where('status','pending')->whereHas('user', function($q)  use ($user)
            {
                    $q->where('city', $user->city);
                    }
            )->get();


    return $this->successResponse($orders, 'تم جلب الطلبات بنجاح', 200);

    }


   public function assignTechnician(AssignTechnicianRequest $request,$id)
{
    $user = auth()->user();

    if ($user->type !== 'manager') {
        return $this->errorResponse('غير مسموح لك بالدخول', 403);
    }

    $order = Order::where('id',$id)
        ->whereIn('status', ['pending', 'rejected', 'not_complete'])
        ->first();

    if (!$order) {
        return $this->errorResponse('الطلب غير موجود أو لا يمكن تعديله', 404);
    }

    $order->technician_id = $request->technician_id;
    $order->manager_id=auth()->user()->id;
    $order->status = 'assigned';
    $order->save();

    return $this->successMessage('تم تحديث الطلب بنجاح');
}

}

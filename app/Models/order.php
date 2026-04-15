<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\ElevatorUser;
use Laravel\Passport\HasApiTokens;
class Order extends Model
{

 use  HasApiTokens;
    protected $fillable = [
        'user_id',
        'category_id',
        'desc',
        'elevator_user_id',
        'status',
        'image_before',
        'image_after',
        'technician_id ',
        'manager_id',
        'reason_rejected',
        'reason_not_complete'
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function manager()
    {
        return $this->belongsTo(User::class,'manager_id');
    }

      public function technician()
    {
        return $this->belongsTo(User::class,'technician_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);


    }

      public function ElevatorUser()
    {
        return $this->belongsTo(ElevatorUser::class);


    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElevatorUser  extends Model
{
    protected $fillable = [
     'user_id',
    'elevator_type',
    'location',
    'official_number',
    'address',
    'is_subscribed',
    'payment_plan',
    'is_active',
    ];
    public function user()
    {
      return  $this->belongsTo(user::class);
    }
}

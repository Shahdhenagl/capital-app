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
        'elevator_user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
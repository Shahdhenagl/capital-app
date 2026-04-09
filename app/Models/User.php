<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'secondary_phone',
        'is_previous_client',
        'location',
        'type',
        'address',
        'elevators_count',
        'elevator_type',
        'commercial_register',
        'tax_card'
        ,'end_date',
        'start_date'
    ];

    // 👇 الحقول اللي لازم تتخفي عند الjson
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_previous_client' => 'boolean',
    ];

    public function elevators()
    {
        return $this->hasMany(ElevatorUser::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use  HasApiTokens,HasFactory, Notifiable;

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
        'start_date',
        'code',
        'code_expires_at',
        'city',
        'lat',
        'long'
    ];

    
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
   
 // app/Models/User.php

public function sendCode()
{
    // 1. توليد الكود
    $code = rand(1111, 9999);

    // 2. التحديث في قاعدة البيانات
    $this->update([
        'code' => $code,
        'code_expires_at' => now()->addMinutes(15),
    ]);

    // 3. هنا تضعين كود الإرسال الفعلي (مثلاً استدعاء SMS Service)
    // SendSms($this->phone, $code);

    return $code; 
}

    /**
     * Route notifications for the WhatsApp channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForWhatsApp($notification)
    {
        $phone = $this->phone ?? $this->secondary_phone;

        // Ensure the phone number starts with the country code, e.g., 966 for KSA
        // This is a basic format assuming Saudi numbers if it starts with 05
        if (strpos($phone, '05') === 0) {
            $phone = '966' . substr($phone, 1);
        }

        return $phone;
    }

}

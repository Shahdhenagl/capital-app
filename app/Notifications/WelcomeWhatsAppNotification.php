<?php

namespace App\Notifications;

use App\Channels\WhatsAppChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class WelcomeWhatsAppNotification extends Notification
{
    use Queueable;

    public $message;

    /**
     * Create a new notification instance.
     *
     * @param string $message
     * @return void
     */
    public function __construct($message = "مرحباً بك في مصاعد عاصمة الكون! هذا إشعار تجريبي عبر الواتساب.")
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WhatsAppChannel::class];
    }

    /**
     * Get the WhatsApp representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string|array
     */
    public function toWhatsApp($notifiable)
    {
        return $this->message;
    }
}

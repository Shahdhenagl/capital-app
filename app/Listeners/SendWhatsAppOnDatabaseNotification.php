<?php

namespace App\Listeners;

use Illuminate\Notifications\Events\NotificationSent;
use App\Channels\WhatsAppChannel;

class SendWhatsAppOnDatabaseNotification
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Notifications\Events\NotificationSent  $event
     * @return void
     */
    public function handle(NotificationSent $event)
    {
        // Only trigger when a database notification is successfully sent
        if ($event->channel === 'database') {
            $notifiable = $event->notifiable;
            $notification = $event->notification;
            
            // Extract the message text depending on the notification type
            $message = 'لديك إشعار جديد في النظام.';
            
            if (class_exists(\Filament\Notifications\Notification::class) && $notification instanceof \Filament\Notifications\Notification) {
                // For Filament notifications
                $title = $notification->getTitle();
                $body = $notification->getBody();
                
                $message = $title;
                if ($body) {
                    $message .= "\n" . strip_tags($body);
                }
            } elseif (method_exists($notification, 'toWhatsApp')) {
                $message = $notification->toWhatsApp($notifiable);
            } elseif (method_exists($notification, 'toArray')) {
                $data = $notification->toArray($notifiable);
                $message = $data['title'] ?? $data['message'] ?? $message;
            } elseif (method_exists($notification, 'toDatabase')) {
                $data = $notification->toDatabase($notifiable);
                $message = $data['title'] ?? $data['message'] ?? $message;
            }

            // Make sure notifiable has routeNotificationForWhatsApp
            if (method_exists($notifiable, 'routeNotificationForWhatsApp')) {
                // Create an ad-hoc notification just for WhatsApp
                $whatsappNotification = new class($message) extends \Illuminate\Notifications\Notification {
                    public $message;
                    
                    public function __construct($message) {
                        $this->message = $message;
                    }
                    
                    public function via($notifiable) {
                        return [WhatsAppChannel::class];
                    }
                    
                    public function toWhatsApp($notifiable) {
                        return $this->message;
                    }
                };

                // Send without queuing to avoid serialization issues with anonymous class,
                // or you can create a real App\Notifications\GenericWhatsAppNotification class.
                $notifiable->notifyNow($whatsappNotification);
            }
        }
    }
}

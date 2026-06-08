<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        // Get the phone number to send the notification to
        $to = $notifiable->routeNotificationFor('WhatsApp', $notification);

        if (! $to) {
            return;
        }

        // Ensure the notification has a toWhatsApp method
        if (! method_exists($notification, 'toWhatsApp')) {
            return;
        }

        // Get the message payload
        $message = $notification->toWhatsApp($notifiable);

        if (is_string($message)) {
            $message = ['message' => $message];
        }

        $url = config('services.bevatel.url');
        $apiKey = config('services.bevatel.api_key');
        $accountId = config('services.bevatel.account_id');
        $inboxId = config('services.bevatel.inbox_id');

        if (! $url || ! $apiKey || ! $accountId || ! $inboxId) {
            Log::error('Bevatel WhatsApp API credentials are not set in the configuration.');
            return;
        }

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'api_access_token' => $apiKey,
                'api_account_id' => $accountId,
            ])->post($url, [
                'inbox_id' => $inboxId,
                'contact' => [
                    'phone_number' => '+' . $to,
                ],
                'message' => [
                    'content' => $message['message'] ?? '',
                ]
            ]);

            if ($response->failed()) {
                Log::error('WhatsApp Bevatel API Error', [
                    'status' => $response->status(),
                    'response' => $response->body(),
                    'phone' => $to
                ]);
            }
        } catch (\Exception $e) {
            Log::error('WhatsApp Bevatel API Exception: ' . $e->getMessage());
        }
    }
}

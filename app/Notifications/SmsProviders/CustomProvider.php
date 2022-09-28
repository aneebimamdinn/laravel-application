<?php
 
namespace App\Notifications\SmsProviders;

use Illuminate\Notifications\Notification;
use App\Notifications\SmsProviders\ProviderInterface;
use Illuminate\Support\Facades\Http;


  
class CustomProvider implements ProviderInterface
{
    public function __construct()
    {
        $this->from = config("sms.providers.custom_provider.from");
        $this->baseUrl = config("sms.providers.custom_provider.base_url");
        $this->user = config("sms.providers.custom_provider.username");
        $this->password = config("sms.providers.custom_provider.pwd");
    }

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);

        return Http::baseUrl($this->baseUrl)->withBasicAuth($this->user, $this->password)
            ->asForm()
            ->post('sms', [
                'from' => $this->from ,
                'to' => $message->to,
                'message' => $message->line
            ]);

    }
}
<?php
 
namespace App\Notifications\SmsProviders;

use Illuminate\Notifications\Notification;
use App\Notifications\SmsProviders\ProviderInterface;
use Illuminate\Support\Facades\Http;


  
class NexmoProvider implements ProviderInterface
{
    public function __construct()
    {
        $this->from = config("sms.providers.nexmo.from");
        $this->key = config("sms.providers.nexmo.key");
        $this->secret = config("sms.providers.nexmo.secret");
    }

    public function send($notifiable, Notification $notification){
        $message = $notification->toSms($notifiable);

        $basic  = new \Nexmo\Client\Credentials\Basic($this->key, $this->secret);
        $client = new \Nexmo\Client($basic);
 
        $message = $client->message()->send([
            'to' => $message->to,
            'from' => $this->from ,
            'text' => $message->line
        ]);

    }
}
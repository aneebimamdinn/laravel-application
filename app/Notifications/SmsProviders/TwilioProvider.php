<?php
 
namespace App\Notifications\SmsProviders;

use Illuminate\Notifications\Notification;
use App\Notifications\SmsProviders\ProviderInterface;
use Twilio\Rest\Client;


  
class TwilioProvider implements ProviderInterface
{
    public function __construct()
    {
        $this->account_sid = config("sms.providers.twilio.account_sid");
        $this->auth_token = config("sms.providers.twilio.auth_token");
        $this->twilio_number = config("sms.providers.twilio.twilio_number");
    }

    public function send($notifiable, Notification $notification){
        $message = $notification->toSms($notifiable);
        
        $account_sid = $this->account_sid;
        $auth_token = $this->auth_token;
        $twilio_number = $this->twilio_number;
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($message->to, 
                ['from' => $twilio_number, 'body' => $message->line] );

    }
}
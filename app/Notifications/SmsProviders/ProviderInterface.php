<?php
 
namespace App\Notifications\SmsProviders;

use Illuminate\Notifications\Notification;
  
interface ProviderInterface
{
    public function send($notifiable, Notification $notification);
}
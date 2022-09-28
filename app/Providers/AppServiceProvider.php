<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notifications\SmsProviders\ProviderInterface;
use App\Notifications\SmsProviders\CustomProvider;
use App\Notifications\SmsProviders\NexmoProvider;
use App\Notifications\SmsProviders\TwilioProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProviderInterface::class, function ($app) {
            $provider = config('sms.default');
            if ($provider == 'nexmo') {
                return NexmoProvider::class;
            }elseif($provider == 'twilio'){
                return TwilioProvider::class;
            }else{
                return CustomProvider::class;
            }
            
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

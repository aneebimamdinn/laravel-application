<?php


namespace App\Notifications\Messages;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class SmsMessage
{

    public  $user;
    public  $password;
    public  $to;
    public  $from;
    public  $line;

    /**
     * SmsMessage constructor.
     * @param array $lines
     */
    public function __construct()
    {
        
    }

    public function line($line = ''): self
    {
        $this->line = $line;

        return $this;
    }

    public function to($to): self
    {
        $this->to = $to;

        return $this;
    }

    public function from($from): self
    {
        $this->from = $from;

        return $this;
    }

    // public function send()
    // {
    //     if (!$this->from || !$this->to || !$this->line) {
    //         throw new \Exception('SMS not correct.');
    //     }

    //     return Http::baseUrl($this->baseUrl)->withBasicAuth($this->user, $this->password)
    //         ->asForm()
    //         ->post('sms', [
    //             'from' => $this->from,
    //             'to' => $this->to,
    //             'message' => $this->line
    //         ]);
    // }
}


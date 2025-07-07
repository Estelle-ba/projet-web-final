<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SendLoginOtp extends Notification
{
    use Queueable;

    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function via($notifiable)
    {
        return ['mail'];  
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Votre code de connexion OTP')
            ->line('Voici votre code OTP : ' . $this->code)
            ->line('Ce code expire dans 10 minutes.')
            ->line('Si vous n\'avez pas demandé ce code, veuillez ignorer ce message.');
    }
}

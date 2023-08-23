<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    use Queueable;
    private $_URL;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->_URL = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = User::where('email','like',request('email'))->get();
        // $name = $user->fullName;
        $url = $this->_URL;
        return (new MailMessage)->from('launching@bncc.net','BNCC Opening Season')->view("emailtemplate.forgotpassEmail", compact('url','user'));

        // return (new MailMessage)
        //             ->line('Hallo ini ya Link Reset Password Kamu')
        //             ->action('Notification Action', $this->_URL)
        //             ->line('BNCC LAUNCHING');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

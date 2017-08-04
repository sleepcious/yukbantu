<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Register extends Notification
{
    use Queueable;
	
	private $pass;
	private $username;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($username, $pass)
    {
        $this->pass = $pass;
        $this->username = $username;
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
        return (new MailMessage)
					->subject(config('app.name').' - Register')
					->from('support@yukbantu.org', config('app.name'))
                    ->greeting('Hai '.$this->username)
                    ->line('Terima kasih telah bergabung bersama kami, berikut password login Anda:')
                    ->line('<strong>'.$this->pass.'</strong>')
                    ->action('Login', url('/login'))
					->line('Anda dapat mengubah password pada menu <strong>Ubah Password</strong> di halaman Dashboard.');
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

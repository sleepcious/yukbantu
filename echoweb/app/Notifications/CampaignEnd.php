<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CampaignEnd extends Notification
{
    use Queueable;
	private $username;
	private $judul;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($username, $judul)
    {
        $this->username = $username;
        $this->judul = $judul;
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
					->subject(config('app.name').' - Campaign Berakhir')
					->from('support@yukbantu.org', config('app.name'))
                    ->greeting('Hai '.$this->username)
                    ->line('Kami informasikan bahwa, campaign Anda '.$this->judul.' telah berakhir.');
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

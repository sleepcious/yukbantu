<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DonasiFail extends Notification
{
    use Queueable;
	private $username;
	private $campaign;
	
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($username, $campaign)
    {
        $this->username = $username;
        $this->campaign = $campaign;
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
					->subject('Donasi Gagal')
					->from('support@yukbantu.org', config('app.name'))
                    ->greeting('Hai '.$this->username)
                    ->line('Mohon maaf, donasi Anda untuk '.$this->campaign.' secara otomatis dibatalkan karena belum ada pembayaran hingga saat ini.');
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

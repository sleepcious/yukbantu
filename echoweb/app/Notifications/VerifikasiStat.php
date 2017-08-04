<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VerifikasiStat extends Notification
{
    use Queueable;
	private $status;
	private $username;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($username, $status)
    {
        $this->status = $status;
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
                    ->subject(config('app.name').' - Verifikasi')
					->from('support@yukbantu.org', config('app.name'))
                    ->greeting('Hai '.$this->username)
                    ->line('Terima kasih telah mengajukan verifikasi kepada kami. Serta kami sampaikan bahwa status verifikasi data Anda adalah:')
                    ->line('<strong>'.$this->status.'</strong>');
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

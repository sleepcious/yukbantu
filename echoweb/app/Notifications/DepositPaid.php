<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DepositPaid extends Notification
{
    use Queueable;
	private $username;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($username)
    {
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
					->subject('Deposit Berhasil')
					->from('support@yukbantu.org', config('app.name'))
                    ->greeting('Hai '.$this->username)
                    ->line('Terima kasih telah melakukan deposit SakuBantu.')
                    ->line('Deposit Anda telah kami verifikasi dan berhasil ditambahkan ke SakuBantu Anda.')
					->line('Anda dapat menggunakan SakuBantu untuk membantu atau berdonasi pada campaign-campaign yang ada dengan lebih cepat dan mudah.');
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

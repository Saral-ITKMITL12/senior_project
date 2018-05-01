<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;


class SendRequest extends Notification
{
    use Queueable;
    public $tran;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tran)
    {
        $this->tran=$tran;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'tran' => $this->tran,
            'user' => auth()->user()
        ];
    }

    public function toArray($notifiable)
    {
      return [
          'tran' => $this->tran,
          'user' => auth()->user()
      ];
    }
}

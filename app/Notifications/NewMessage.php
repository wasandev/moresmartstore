<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;


class NewMessage extends Notification implements ShouldQueue
{
    use Queueable;


    protected $messageData;
    protected $recipientId;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(int $recipientId, array $messageData)
    {
        $this->recipientId = $recipientId;
        $this->messageData = $messageData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'recipientId' => $this->recipientId,
            'sender_name' => $this->messageData["sender_name"],
            'thread_id' => $this->messageData["thread_id"],
        ];
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
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'recipientId' => $this->recipientId,
                'sender_name' => $this->messageData["sender_name"],
                'thread_id' => $this->messageData["thread_id"],
            ],
        ];
    }
}

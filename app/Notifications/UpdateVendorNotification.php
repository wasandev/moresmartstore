<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class UpdateVendorNotification extends Notification
{
    use Queueable;

    protected $vendor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $url = url('/app/resources/vendors/'.$this->vendor->id);
        $name  = $this->vendor->name ;
        $user = $this->vendor->user->name;

        return (new MailMessage)
                    ->subject('มีการแก้ข้อมูลธุรกิจใน mStore')
                    ->markdown('emails.updatevendor', ['url' => $url,'name' => $name ,'user' => $user])
                    ;
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
            'vendor_id' => $this->vendor->id,
            'name' => $this->vendor->name,
        ];
    }
}

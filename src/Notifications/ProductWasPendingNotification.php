<?php

namespace Core\Api\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Core\Api\Models\Product;

class ProductWasPendingNotification extends Notification
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
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
        return (new MailMessage)->from('test@example.com', 'Core\Api package')
            ->line("Your product '{$this->product->name}' was pending")
            ->line('Thank you for using our application!');
    }
}

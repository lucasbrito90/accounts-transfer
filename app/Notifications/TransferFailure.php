<?php

namespace App\Notifications;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransferFailure extends Notification implements ShouldQueue
{
    use Queueable;
    protected Customer $customer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
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
        return (new MailMessage())
            ->line('Transferência Falhou.')
            ->subject('Transferência Falhou')
            ->greeting('Ola! Sr(a). ' . $this->customer->name)
            ->line('Não foi possível realizar a transferência. Mas, fique tranquilo não foi retirado nenhum valor da sua conta.')
            ->action('Favor, para mais esclarecimentos acesse', url('/'))
            ->line('Desculpa o trânstorno!');
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

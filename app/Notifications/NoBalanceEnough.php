<?php

namespace App\Notifications;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NoBalanceEnough extends Notification implements ShouldQueue
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
                    ->line('Sem Saldo Suficiente para Transação.')
                    ->subject('Sem Saldo Suficiente')
                    ->greeting('Ola! Sr(a). ' . $this->customer->name)
                    ->line('Percebemos que foi realizada uma tentativa de transferência,
                     porém infelizmente não existe saldo suficiente na conta!')
                    ->action('Favor, para mais esclarecimentos acesse', url('/'))
                    ->line('Obrigado por nos escolher!');
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

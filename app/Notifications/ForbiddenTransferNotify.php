<?php

namespace App\Notifications;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForbiddenTransferNotify extends Notification implements ShouldQueue
{
    use Queueable;

    public Customer $customer;
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
                    ->line('Erro ao transferir valor.')
                    ->subject('Erro ao transferir valor')
                    ->greeting('Ola! Sr(a). ' . $this->customer->name)
                    ->line('Não foi possível transferir o valor. Favor, entre em contato pelo site.')
                    ->action('Link de acesso ao site', url('/'))
                    ->line('Desculpa, o transtorno!');
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

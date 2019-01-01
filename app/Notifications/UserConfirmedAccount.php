<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserConfirmedAccount extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject(__('dashboard/mail.account_ready'))
            ->greeting(__('dashboard/mail.title_contact_us',['full_name' => $notifiable->firstname]))
            ->line(__('dashboard/mail.congrats_activated'))
            ->line("")
            ->line(__('dashboard/mail.account_holder'))
            ->line(__('dashboard/mail.full_name',['full_name' => $notifiable->fullname]))
            ->line(__('dashboard/mail.email',['email' => $notifiable->email]))
            ->line(__('dashboard/mail.password'))
            ->line("")
            ->action(__('dashboard/mail.signIn'), url('/auth/login'));
    }
}

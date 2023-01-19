<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProblemWithYourPurchaseNotification extends Notification
{
    use Queueable;

    public function __construct(public Article $article)
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Ouch, something went wrong with your purchase')
            ->greeting("Hi {$notifiable->name},")
            ->line('Thank you for considering to support me. However, something went wrong in the process, and you will need to retry to buy the artice.')
            ->action('Retry here', route('articles.show', ['article' => $this->article]))
            ->line("Don't forget, you need to be logged in to be able to buy")
            ->salutation('Thanks again for your support & warm regards,<br>Nico');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

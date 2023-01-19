<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ThankYouForYourPurchaseNotification extends Notification
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
            ->subject('Thank you for your purchase!')
            ->greeting("Hi {$notifiable->name},")
            ->line('Thank you for your support, it really means a lot to me!')
            ->action("Check out 'your article'", route('articles.show', ['article' => $this->article]))
            ->salutation('Thanks again for your support & warm regards,<br>Nico');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\User;
use App\Notifications\WelcomeToNewUserNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        sleep(5);
        $latest_articles = Article::latest()->take(2)->get();
        $this->user->notify(new WelcomeToNewUserNotification($latest_articles));
    }
}

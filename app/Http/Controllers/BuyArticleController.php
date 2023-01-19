<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Notifications\ProblemWithYourPurchaseNotification;
use App\Notifications\ThankYouForYourPurchaseNotification;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;


class BuyArticleController extends Controller
{
    public function preparePayment(Article $article, int $amount, Request $request)
    {
        $devWebhookUrl = 'https://qn7fnlzxoq.sharedwithexpose.com/api/mollie';

        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => "{$amount}.00"
            ],
            "description" => "Order of article nr {$article->id}",
            "redirectUrl" => route('order.success', ['article' => $article]),
            "webhookUrl" => config('app.env') === 'production' ? route('mollie-webhook') : $devWebhookUrl,
            "metadata" => [
                "order_id" => "12345",
                "user_id" => auth()->id(),
                "article_id" => $article->id,
            ],
        ]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function successfulPayment(Article $article)
    {
        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function webhook(Request $request)
    {
        // Check if it is a valid Mollie request
        if(!$request->has('id')) {
            return 'error';
        }

        $payment_id = $request->input('id');
        $payment = Mollie::api()->payments->get($payment_id);


        $article = Article::find($payment->metadata->article_id);
        $user = User::find($payment->metadata->user_id);

        // What to do if payment was not successful
        if($payment->status !== 'paid') {
            $user->notify(new ProblemWithYourPurchaseNotification($article));
            return null;
        }


        $article->update([
            'owner_id' => $user->id,
            'price' => (int) (((float) $payment->amount->value ) * 100),
        ]);

        $user->notify( new ThankYouForYourPurchaseNotification($article));

        ray($article, $user, $payment)->purple();


    }
}

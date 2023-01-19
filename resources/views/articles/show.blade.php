<x-site-layout title="Read {{$article->title}}">

    @if($article->owner_id)
        <div class="p-4 bg-green-100 mb-5">
            This article is offered to you by {{$article->owner->name}} for the amount of {{$article->price/100}}.
        </div>


        @else
        @auth
            <div class="p-4 bg-pink-100 mb-5">
                Hey {{auth()->user()->name}},
                did you know you can support me? Please buy this article for
                @foreach(['50', '75', '150'] as $amount)
                    <a href="{{route('prepare-payment', ['article' => $article, 'amount' => $amount])}}" class="mr-4 bg-pink-500 text-pink-50 rounded p-1">€ {{$amount}}</a>.
                @endforeach
            </div>
        @endauth
    @endif

    <div class="w-full">
        <img src="{{ $article->media->first()?->getUrl('header')}}" class="w-full object-cover">
    </div>

    <div class="mb-6 flex justify-end">
        <a href="{{route('home.articles.edit', $article->id)}}" class="p-2 bg-green-500 text-green-50 rounded-lg">edit</a>
    </div>

    <div class="text-purple-600 mb-6">
        Written by
        <a href="{{route('users.show', $article->author->id)}}" class="underline">
            {{$article->author->name}}
        </a>
    </div>

    <div>
        @foreach($article->keywords as $keyword)
            <span class="mr-2 p-1 bg-teal-200 rounded">{{$keyword->name}}</span>
        @endforeach
    </div>

    {!! $article->body !!}

</x-site-layout>

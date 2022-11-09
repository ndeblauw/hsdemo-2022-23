<x-site-layout title="Welcome Class">

    @foreach($articles as $article)
        <h2 class="font-bold">{{ $article->title }}</h2>
        <div>{{ $article->body }}</div>
    @endforeach

</x-site-layout>

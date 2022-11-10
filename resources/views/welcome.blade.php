<x-site-layout title="Welcome Class">


    <h2>Latest articles (out of {{$articles_count}})</h2>
    @foreach($articles as $article)
        <h2 class="font-bold">{{ $article->title }}</h2>
        <div>{{ $article->body }}</div>
    @endforeach

</x-site-layout>

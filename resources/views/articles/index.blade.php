<x-site-layout title="List of articles on this blog">

    <ul class="list-disc pl-5">
        @foreach($articles as $article)
            <li>
                <a href="{{route('articles.show', $article->id)}}">
                    <span class="font-semibold">{{$article->title}}</span>
                    <span class="text-sm">{{ Str::limit($article->body, 80)}}</span>
                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>

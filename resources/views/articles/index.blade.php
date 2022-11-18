<x-site-layout title="List of articles on this blog">

    <div class="mb-6 flex justify-end">
        <a href="{{route('home.articles.create')}}" class="p-2 bg-green-500 text-green-50 rounded-lg">Add an article</a>
    </div>

    {{ $articles->links() }}

    <ul class="list-disc pl-5">
        @foreach($articles as $article)
            @ray($article)
            <li>
                <a href="{{route('articles.show', $article->id)}}">
                    <span class="font-semibold">{{$article->title}}</span>
                    <span class="text-sm">{{ Str::limit($article->body, 80)}}</span>
                </a>
                <a href="{{route('home.articles.edit', $article->id)}}">edit</a><br/>
                {{$article->author->name}}
                <span>Keywords: {{$article->keywords->pluck('name')->implode(',')}}</span>
            </li>
            @ray($article)
        @endforeach
    </ul>

    {{ $articles->links() }}

</x-site-layout>

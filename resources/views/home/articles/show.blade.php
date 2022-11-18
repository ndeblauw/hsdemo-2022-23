<x-app-layout title="Read {{$article->title}}">

    <div class="mb-6 flex justify-end">
        <a href="{{route('home.articles.edit', $article->id)}}" class="p-2 bg-green-500 text-green-50 rounded-lg">edit</a>
    </div>


    <h1 class="font-semibold">{{$article->title}}</h1>

    <div class="w-full">
        <img src="{{ $article->media->first()?->getUrl('thumbnail')}}" class="">
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

</x-app-layout>

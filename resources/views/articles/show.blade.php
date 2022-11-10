<x-site-layout title="Read {{$article->title}}">

    <div class="text-purple-600 mb-6">
        Written by
        <a href="{{route('users.show', $article->author->id)}}" class="underline">
            {{$article->author->name}}
        </a>
    </div>

    {{$article->body}}

</x-site-layout>

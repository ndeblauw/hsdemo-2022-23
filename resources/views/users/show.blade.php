<x-site-layout title="Meet {{$user->name}}">

{{$user->email}}

    <h2 class="font-bold mb-2 mt-5">Articles written by</h2>
    <ul class="list-disc pl-5">
        @foreach($user->articles as $article)
            <li>
                <a href="{{route('articles.show', $article->id)}}" class="underline hover:bg-gray-200">
                    {{$article->title}}
                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>

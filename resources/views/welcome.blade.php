<x-site-layout title="Welcome Class">

    <div class="flex flex-row gap-x-6">
        <div class="w-2/3">
            @foreach($articles as $article)
                <div class="mb-4">

                    <a href="{{route('articles.show', $article)}}" class="relative block w-full h-52 rounded">
                        <img src="{{ $article->media->first()?->getUrl('header')}}" class="object-cover rounded">

                        <div class="absolute top-12 left-4 z-50 ">
                            <h2 class=" text-2xl font-bold text-white bg-indigo-500 p2 inline-block">{{ $article->title }}</h2>

                            <div class="mt-4 ml-8 border-l-2 border-indigo-500 p-2 backdrop-blur-md w-3/4 text-white">
                                {{ Str::limit($article->body, 100) }}
                            </div>

                        </div>

                    </a>


                </div>

            @endforeach
        </div>

        <div class="w-1/3">
            <h2 class="text-gray-500 uppercase font-semibold">Some of our top authors</h2>

            @foreach($users as $author)
                <div class="flex flex-col gap-x-2 p-4">
                    <h3 class="">{{ $author->name }} <span class="text-gray-500">wrote on...</span></h3>

                    <ul class="list-disc ml-4">
                        @foreach($author->articles as $article)
                            <li>
                                <a href="{{route('articles.show', $article)}}" class="text-indigo-500 hover:bg-indigo-50">{{ $article->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div class="bg-gray-100 p-4 rounded-lg">
                <h2 class="text-gray-500 uppercase font-semibold">Also want to join as an author?</h2>

                <p class="mt-8">
                    You can!<br/>
                    It's as simple as <a href="{{route('register')}}" class="text-indigo-500 hover:bg-indigo-50">registering for an account</a>!
                </p>
            </div>


        </div>
    </div>


</x-site-layout>

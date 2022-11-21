<x-app-layout>

    <x-form method="post" route="{{route('home.articles.update', $article->id)}}" title="edit article" submit="Update">
        @method('put')

        <x-form-input name="title" label="Article Title" placeholder="give a title of at least 5 characters" :errors="$errors" value="{{$article->title}}"/>
        <x-form-rte name="body" label="Actual article" placeholder="You must write something" :errors="$errors" value="{{$article->body}}"/>

        <x-form-input name="keywords" label="Keywords" placeholder="Comma separated list of keywords" :errors="$errors" value="{{$article->keywords->pluck('name')->implode(', ')}}"/>


        <x-form-file name="image" label="Main image" placeholder="" :errors="$errors" value=""/>
    </x-form>


</x-site-layout>

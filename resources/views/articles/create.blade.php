<x-site-layout>

    <x-form method="post" route="{{route('articles.store')}}" title="create article" submit="Create">
        <x-form-input name="title" label="Article Title" placeholder="give a title of at least 5 characters" :errors="$errors" value=""/>
        <x-form-text-area name="body" label="Actual article" placeholder="You must write something" :errors="$errors" value=""/>
    </x-form>


</x-site-layout>

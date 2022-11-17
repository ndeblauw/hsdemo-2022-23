<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new article') }}
        </h2>
    </x-slot>


    <x-form method="post" route="{{route('home.articles.store')}}" title="create article" submit="Create">
        <x-form-input name="title" label="Article Title" placeholder="give a title of at least 5 characters" :errors="$errors" value=""/>
        <x-form-text-area name="body" label="Actual article" placeholder="You must write something" :errors="$errors" value=""/>
        <x-form-file name="image" label="Main image" placeholder="" :errors="$errors" value=""/>
    </x-form>


</x-site-layout>

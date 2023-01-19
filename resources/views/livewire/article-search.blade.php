<div class="p-2 rounded-xl" style="background-color:#{{$background_color}};">


    <input type="text" placeholder="Search for articles"  wire:model.defer="search">

    <button wire:click="search" class="bg-red-100 p-1">Search</button>

    <ul class="list-disc pl-4">
    @foreach($articles as $article)
        <li>{{$article->title}}</li>
    @endforeach
    </ul>
</div>

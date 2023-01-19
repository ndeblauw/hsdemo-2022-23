<div class="mb-12">

    <div >
        {{ $counter }}
        <button wire:click="increment" >+</button>
        <a href="" wire:click.prevent="decrement({{5}})">-</a>

        <button wire:click="$set('counter', 100)">Set to 100</button>

        <button wire:click="$emit('myCrazyEvent')" class="bg-pink-50 p-1 rounded">Let's go crazy</button>
    </div>


    <div class="mt-5 bg-blue-50 p-2">
        <input type="text" wire:keydown="increment" wire:model="counter" >

    </div>


    {{ $article?->title ?? 'No article selected' }}
</div>

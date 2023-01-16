<div class="mb-12">

    <div >
        {{ $counter }}
        <button wire:click="increment" >+</button>
        <button wire:click="decrement">-</button>
    </div>

    <div class="mt-5 bg-blue-50 p-2">
        <input type="text" wire:model="counter" >

    </div>


    {{ $article?->title ?? 'No article selected' }}
</div>

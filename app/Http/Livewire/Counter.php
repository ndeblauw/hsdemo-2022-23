<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Counter extends Component
{
    public $counter = 5;
    public Article $article;

    public function increment()
    {
        $this->counter++;
        $this->article = Article::find($this->counter);
    }

    public function decrement(int $diff)
    {
        $this->counter -= $diff;
    }

    public function render()
    {
        if($this->counter > 99) {
            $this->counter *= 2;
        }

        if($this->counter > 202) {
            $this->emit('myCrazyEvent');
        }

        return view('livewire.counter');
    }
}

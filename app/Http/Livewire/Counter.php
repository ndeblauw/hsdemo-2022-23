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

    public function decrement()
    {
        $this->counter--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}

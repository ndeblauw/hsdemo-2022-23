<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleSearch extends Component
{
    public $search = '';


    public function search()
    {
        ray('helly');
    }

    public function render()
    {
        $articles = Article::where('title', 'like', "%{$this->search}%")->take(10)->get();

        return view('livewire.article-search', compact('articles'));
    }
}

/*
public $background_color = 'EEEEEE';

public $listeners = ['myCrazyEvent' => 'changeBackgroundColor'];

public function changeBackgroundColor()
{
    $this->background_color = sprintf('%06X', mt_rand(0, 0xFFFFFF));
}

// style="background-color:#{{$background_color}};"
*/


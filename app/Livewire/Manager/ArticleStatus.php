<?php

namespace App\Livewire\Manager;

use App\Models\Article;
use Livewire\Component;

class ArticleStatus extends Component
{

    public $status;
    public $article;

    public function mount($article)
    {
        $this->article = Article::findOrFail($article);
    }

    public function chainge($value)
    {
        $this->article->update([
            'status' => $value
        ]);
    }

    public function render()
    {
        return view('livewire.manager.article-status');
    }
}

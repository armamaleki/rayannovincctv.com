<?php

namespace App\View\Components\Client;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LastArticles extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $articles = Article::where('status' , 'active')->latest()->take(8)->get();
        return view('components.client.last-articles' , compact('articles'));
    }
}

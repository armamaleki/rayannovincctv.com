<?php

namespace App\View\Components\Client;

use App\Models\Attribute;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductFilters extends Component
{
    public $attributes;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->attributes = Attribute::with('values')->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.product-filters');
    }
}

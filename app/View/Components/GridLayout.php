<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GridLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $items = [],
        public ?string $itemComponent = null,
        public ?string $routeName = null,
        public string $routeParam = 'id',
        public string $titleField = 'title',
        public string $titleArField = 'title_ar',
        public string $headerTitle = '',
        public string $headerDescription = '',
        public bool $showHeader = true,
        public string $columns = 'grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3',
        public string $gap = 'gap-6',
        public float $animationDelay = 0.04,
        public bool $showAnimation = true,
        public string $wrapperClass = 'card-wrapper'
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.grid-layout');
    }
}

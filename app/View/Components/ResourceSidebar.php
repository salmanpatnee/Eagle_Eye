<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResourceSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = 'Resources',
        public string $description = 'Access helpful materials and tools',
        public bool $showAnimation = true
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.resource-sidebar');
    }
}

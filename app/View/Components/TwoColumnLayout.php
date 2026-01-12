<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TwoColumnLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $mainColumnSize = 'lg:col-span-3',
        public string $sidebarColumnSize = 'lg:col-span-2',
        public string $gap = 'gap-6 lg:gap-8',
        public bool $showAnimation = true
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.two-column-layout');
    }
}

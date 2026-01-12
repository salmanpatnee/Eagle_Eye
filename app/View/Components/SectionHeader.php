<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public string $subtitle = 'Comprehensive guide and resources',
        public ?string $icon = null,
        public bool $showAnimation = true
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section-header');
    }
}

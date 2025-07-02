<?php

namespace App\View\Components;

use Closure;
use Dotenv\Util\Str;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navLink extends Component
{  
    
    public string $href;
    public bool $active = false;
   public string $icon;
    /**
     * Create a new component instance.
     */
    public function __construct( String $href = '',string $icon = '', bool $active = false )
    {
     $this->href = $href;
     $this->icon = $icon;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-link');
    }
}

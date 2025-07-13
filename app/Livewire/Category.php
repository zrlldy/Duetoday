<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

// #[Layout('layout.app')]
class Category extends Component
{
    public function render()
    {
        return view('livewire.category')->layout('layout.app');
    }
}

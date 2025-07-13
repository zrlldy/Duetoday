<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

// #[Layout('layout.app')]

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard')->layout('layout.app');
    }
}

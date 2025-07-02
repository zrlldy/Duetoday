<?php

namespace App\Livewire;
use App\Models\Categories;
use Livewire\Component;



use Livewire\Attributes\Layout;
// #[Layout('layout.app')]
class Category extends Component
{

  
    public function render()
    {
        return view('livewire.category');
    }
}

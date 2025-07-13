<?php

namespace App\Livewire;

use Livewire\Component;

class SearchItems extends Component
{
    public $query = '';

    public function updatedQuery()
    {

        $this->dispatch('updatedQuery', $this->query); // Fire on typing
    }

    public function render()
    {
        return view('livewire.search-items');
    }
}

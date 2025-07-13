<?php

namespace App\Livewire;

use App\Models\Categories;
use Livewire\Component;

class ShowTaskCategories extends Component
{
    public $category;
    public $tasks = [];
    public function mount(Categories $categories)
    {
        $this->category = $categories;

        $this->tasks = $this->category->tasks;
    }
    public function render()
    {
        return view("livewire.show-task-categories", [
            "tasks" => $this->tasks,
        ]);
    }
}

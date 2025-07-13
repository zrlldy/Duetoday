<?php

namespace App\Livewire;

use Livewire\Component;

class ShowTaskCategories extends Component
{
    public $task;
    public function mount($task)
    {
        $this->task = $task;
    }
    public function render()
    {
        return view("livewire.show-task-categories");
    }
}

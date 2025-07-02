<?php

namespace App\Livewire;

use App\Models\Categories;
use App\Models\Task as TaskModel;
use Livewire\Component;
use Livewire\Attributes\Layout;
// #[Layout('layout.app')]
class Task extends Component
{
    public $task;
    public $due_date;
    public $description= '';

    public $selectedCategories = [];
    public function addTask()
    {
        // Validate the task input
        $this->validate([
            'task' => 'required|string|max:255',
        ]);


        
        // Logic to add the task (e.g., save to database)
        TaskModel::create(['title' => $this->task]);

        // Reset the task input after adding
        // $this->task = '';
        $this->reset('task');
    }

    public function updateTask($taskId)
    {
        // Validate the task input
        $this->validate([
            'description' => 'required|string|max:255',
            'due_date' => 'required|date', // Uncomment if you want to validate due_date
        ]);

        // Logic to update the task (e.g., save to database)
         $task = TaskModel::find($taskId);
 
            $task->update(['description' => $this->description,
                           'due_date' => $this->due_date,
                         ]);
        
        
        // Reset the task input after updating
        $this->reset('description');
    }


public function addSelectedCategoriesToTask($taskId)
{
    $task = TaskModel::find($taskId);

    if ($task) {
        $task->categories()->syncWithoutDetaching($this->selectedCategories);
        $this->selectedCategories = []; // reset if needed
    }
}





    public function render()
    {
        $tasks = TaskModel::with('categories')->get(); // Fetch tasks with their categories
       
        $category = Categories::with('tasks')->get(); // Fetch all categories if needed
       return view('livewire.task', ['tasks' => $tasks], ['category'=>$category]); // now it's $tasks in Blade
    }
}

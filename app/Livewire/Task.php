<?php

namespace App\Livewire;

use App\Models\Categories;
use App\Models\Task as TaskModel;
use Livewire\Component;

class Task extends Component
{
    public $task;

    public $due_date;

    public $description = '';

    public $selectedCategories = [];

    public $searchTerm = '';

    protected $listeners = [
        'updatedQuery' => 'searchQuery', // Must match dispatch event
    ];

    public function searchQuery($query)
    {

        // logger("Search received: " . $query);
        $this->searchTerm = $query;
    }

    public function addTask()
    {
        $this->validate([
            'task' => 'required|string|max:255',
        ]);
        $this->dispatch('taskAdded', $this->task);
        TaskModel::create(['title' => $this->task]);

        $this->reset('task');
    }

    public function updateTask($taskId)
    {
        $this->validate([
            'description' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        $task = TaskModel::find($taskId);

        if ($task) {
            $task->update([
                'description' => $this->description,
                'due_date' => $this->due_date,
            ]);
        }

        $this->reset(['description', 'due_date']);
    }

    public function deleteTask($taskid)
    {
        $FindTask = TaskModel::findOrFail($taskid);
        $FindTask->delete();
        $this->dispatch('taskdeleted', $FindTask->title);
    }

    public function toggleTerms($taskId)
    {
        $task = TaskModel::find($taskId);

        if ($task) {
            $task->status = $task->status === 'completed' ? 'pending' : 'completed';
            $task->save();
        }
    }

    public function addSelectedCategoriesToTask($taskId)
    {
        $task = TaskModel::find($taskId);

        if ($task) {
            $task->categories()->sync($this->selectedCategories);
            $this->selectedCategories = [];
        }
    }

    public function render()
    {
        // $tasks = TaskModel::with('categories')->get();

        $tasks = TaskModel::with('categories')->SearchTask($this->searchTerm)->get();
        $category = Categories::all();

        return view('livewire.task', [
            'tasks' => $tasks,
            'category' => $category,
        ])->layout('layout.app');
    }
}

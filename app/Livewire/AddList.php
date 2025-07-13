<?php

namespace App\Livewire;

use App\Models\Categories;
use App\Models\Task;
use Livewire\Component;

class AddList extends Component
{
    public $newCategory = '';

    public function addCategory()
    {
        // Validate the new category input
        $this->validate([
            'newCategory' => 'required|string|max:10|min:1|unique:categories,name',
        ]);

        // Create a new category
        Categories::create(['name' => $this->newCategory]);

        $this->dispatch('taskAdded', $this->newCategory);
        $this->reset('newCategory');
    }

    public function deleteCategory($categoryId)
    {
        // Find the category by ID and delete it
        $category = Categories::find($categoryId);
        if ($category) {
            $category->delete();
        }

        $this->dispatch('taskdeleted', $category->name);
    }

    public function render()
    {
        $task = Task::with('categories')->get(); // Fetch tasks with their categories

        $categories = Categories::all();

        return view('livewire.add-list', ['categories' => $categories], ['task' => $task]); // now it's $task in Blade
    }
}

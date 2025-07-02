<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the tasks associated with the category.
     */
    public function tasks()
    {
            return $this->belongsToMany(Task::class, 'category_tasks','categories_id', 'task_id');

    }
    
}

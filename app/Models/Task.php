<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'categories_id', 'status', 'due_date', 'description'];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_tasks', 'task_id', 'categories_id');
    }

    public function subTasks()
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

    public function scopeSearchTask(Builder $query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            $q->where(function ($subQuery) use ($search) {
                $subQuery->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('due_date', 'LIKE', "%{$search}%");
            });
        });
    }
}

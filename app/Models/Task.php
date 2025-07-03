<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder; 
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'categories_id', 'status','due_date', 'description'];



  public function categories()
{
    return $this->belongsToMany(Categories::class, 'category_tasks','task_id', 'categories_id');
}

    public function subTasks()
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

 // Inside Task.php model
public function scopeSearchTask( Builder $query, $search)
{
    return $query->where('title', 'LIKE', "%{$search}%");
}

}

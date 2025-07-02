<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTask extends Model
{
    
    use HasFactory;

    protected $fillable = ['categories_id', 'task_id','created_at', 'updated_at'];


    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }


}

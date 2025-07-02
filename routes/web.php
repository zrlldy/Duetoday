<?php

use App\Livewire\Calendar;
use App\Livewire\Dashboard;
use App\Livewire\Task;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/task',Task::class);
Route::get('/',Dashboard::class);
Route::get('/calendar',Calendar::class);
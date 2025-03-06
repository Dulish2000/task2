<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TaskController;
use App\Models\Task;

//show all tasks 
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

//show the form to create new tasks
Route::get('/tasks/create',[TaskController::class, 'create'])->name('tasks.create');

//store a new task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

//show a single task 
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

//show the form to edit the task
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

//update a task
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

//delete a task
Route::delete('/tasks/{task}',[TaskController::class, 'destroy'])->name('tasks.destroy');
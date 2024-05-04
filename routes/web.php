<?php

use App\Livewire\Tasks\CreateTask;
use App\Livewire\Tasks\EditTask;
use App\Livewire\Tasks\Index as TasksIndex;
use App\Livewire\Tasks\ShowTask;
use App\Livewire\Tasks\ShowTasks;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])
    ->prefix('tasks')
    ->group(function () {
        Route::get('', TasksIndex::class)
            ->name('tasks.index');
    });


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

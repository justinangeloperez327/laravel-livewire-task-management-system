<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public Collection $tasks;
    public $task = null;
    public $title = '';
    public $description = '';
    public $status = 'pending';

    public Collection $pendingTasks;
    public Collection $completedTasks;
    public Collection $inProgressTasks;

    public bool $showModal = false;

    protected $listeners = ['showTaskModal' => 'showTaskModal'];

    public function mount()
    {
        $this->tasks = Task::orderBy('created_at', 'asc')->get();

        $this->pendingTasks = $this->tasks->where('status', 'pending');
        $this->completedTasks = $this->tasks->where('status', 'completed');
        $this->inProgressTasks = $this->tasks->where('status', 'in-progress');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.tasks.index');
    }

    public function showTaskDetails(Task $task)
    {
        if($task) {
            $this->title = $task->title;
            $this->description = $task->description;
            $this->status = $task->status;
            $this->showModal = true;
            $this->dispatch('open-modal', name: 'task-modal');
        }
    }

    public function updateTaskStatus()
    {
        if($this->task) {
            $this->task->update([
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
            ]);
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

}

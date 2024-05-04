<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $projects;
    public Project $project;

    public function mount()
    {
        $this->projects = Project::all();
    }

    public function render()
    {
        return view('livewire.projects.index');
    }
}

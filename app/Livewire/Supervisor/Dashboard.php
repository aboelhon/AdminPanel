<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.supervisor.dashboard')->layout('components.layouts.supervisor.dashboard');
    }
}

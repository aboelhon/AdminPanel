<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Supervisorlogin extends Component
{
    public $email = 'supervisor@msn.com';
    public $password = '123456';
    public function render()
    {
        return view('livewire.supervisor.supervisorlogin')->layout('components.layouts.supervisor.login');
    }
    public function login()
    {
        $supervisor = Auth::guard('supervisor')->attempt(['email' => $this->email, 'password' => $this->password]);
        if ($supervisor) {
            return redirect(route('supervisor.dashboard'));
        }
        return redirect(route('supervisor.login'));
    }
}

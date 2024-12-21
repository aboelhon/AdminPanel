<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Adminlogin extends Component
{
    public $email = 'hany@msn.com';
    public $password = '123456';
    public function render()
    {

        return view('livewire.admin.adminlogin')->layout('components.layouts.admin.login');
    }

    public function login()
    {
        $admin = Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password]);
        if (!$admin) {
            return redirect(route('admin.login'));
        }
        return redirect(route('admin.dashboard'));
    }
}

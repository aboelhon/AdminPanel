<?php

namespace App\Livewire\Admin\Supervisor;

use App\Models\Supervisor\Supervisor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AddSupervisor extends Component
{
    use WithFileUploads;
    public $name, $email, $password, $username, $picture, $address, $phone, $birthdate, $status, $ip_address;
    
    public function render()
    {
        return view('livewire.admin.supervisor.add-supervisor')->layout('components.layouts.admin.supervisor.add-supervisor');
    }
    public function add_admin()
    {

        sleep(1);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:supervisors,email',
            'password' => 'required|string|min:8',
            'username' => 'required|string|unique:supervisors,username|max:255',
            'picture' => 'nullable|image|max:1024', // 1MB Max
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:supervisors,phone',
            'birthdate' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d')],
            'status' => 'required|in:active,inactive|string',
        ]);

        $supervisorData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),   
            'username' => $this->username,
            'picture' => $this->picture ? $this->picture->store('admin/supervisor/photo', 'public') : 'admin/supervisor/photo/default.jpg',
            'address' => $this->address,
            'phone' => $this->phone,  
            'birthdate' => $this->birthdate,
            'role' => 'supervisor',
            'status' => $this->status,
            'by' => Auth::guard('admin')->user()->username,
            'ip_address' => request()->ip(),
        ];

        // Handle picture upload or set default

        Supervisor::create($supervisorData);

        $this->reset();
        return Session::flash('supervisor_added', 'New supervisor added successfully');
    }
}

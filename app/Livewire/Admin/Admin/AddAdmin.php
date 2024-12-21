<?php

namespace App\Livewire\Admin\Admin;

use Livewire\Component;
use App\Models\Admin\Admin;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AddAdmin extends Component
{
    use WithFileUploads;
    public $name, $email, $password, $username, $picture, $address, $phone, $birthdate, $status, $ip_address;
    
    public function render()
    {
        return view('livewire.admin.admin.add-admin')->layout('components.layouts.admin.admin.add-admin');
    }

    public function add_admin()
    {

        sleep(1);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8',
            'username' => 'required|string|unique:admins,username|max:255',
            'picture' => 'nullable|image|max:1024', // 1MB Max
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:admins,phone',
            'birthdate' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d')],
            'status' => 'required|in:active,inactive|string',
        ]);

        $adminData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),   
            'username' => $this->username,
            'picture' => $this->picture ? $this->picture->store('admin/admin/photo', 'public') : 'admin/admin/photo/default.jpg',
            'address' => $this->address,
            'phone' => $this->phone,  
            'birthdate' => $this->birthdate,
            'role' => 'admin',
            'status' => $this->status,
            'by' => Auth::guard('admin')->user()->username,
            'ip_address' => request()->ip(),
        ];

        // Handle picture upload or set default

        Admin::create($adminData);

        $this->reset();
        return Session::flash('admin_added', 'New admin added successfully');
    }
}

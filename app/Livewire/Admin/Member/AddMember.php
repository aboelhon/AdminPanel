<?php

namespace App\Livewire\Admin\Member;

use Livewire\Component;
use App\Models\Member\Member;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AddMember extends Component
{
    use WithFileUploads;
    public $name, $email, $password, $username, $picture, $address, $phone, $birthdate, $status, $ip_address;

    public function render()
    {
        return view('livewire.admin.member.add-member')->layout('components.layouts.admin.member.add-member');
    }
    public function add_member()
    {

        sleep(1);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|string|min:8',
            'username' => 'required|string|unique:members,username|max:255',
            'picture' => 'nullable|image|max:1024', // 1MB Max
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:members,phone',
            'birthdate' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d')],
            'status' => 'required|in:active,inactive|string',
        ]);

        $memberData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'username' => $this->username,
            'picture' => $this->picture ? $this->picture->store('admin/member/photo', 'public') : 'admin/member/photo/default.jpg',
            'address' => $this->address,
            'phone' => $this->phone,
            'birthdate' => $this->birthdate,
            'role' => 'member',
            'status' => $this->status,
            'by' => Auth::guard('admin')->user()->username,
            'ip_address' => request()->ip(),
        ];

        // Handle picture upload or set default

        Member::create($memberData);

        $this->reset();
        return Session::flash('member_added', 'New member added successfully');
    }
}

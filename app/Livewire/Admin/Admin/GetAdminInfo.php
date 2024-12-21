<?php

namespace App\Livewire\Admin\Admin;

use Livewire\Component;
use App\Models\Admin\Admin;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GetAdminInfo extends Component
{
    use WithFileUploads;
    public $admin, $name, $email, $re_email, $password, $re_password, $username, $picture, $address, $phone, $birthdate, $status, $ip_address;

    public function render()
    {
        return view('livewire.admin.admin.get-admin-info')->layout('components.layouts.admin.admin.get-admin-info');
    }

    public function mount($id)
    {
        $this->admin =  Admin::findOrFail($id);
    }

    public function updateName()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Admin::where('id', $this->admin->id)->update([
            'name' => $this->name
        ]);
        return Session::flash('updated_name', 'admin\'s name updated successfully');
    }
    public function updateEmail()
    {
        $this->validate([
            'email' => 'required|email|unique:admins,email',
            're_email' => 'required|email|unique:admins,email|same:email',
        ]);

        Admin::where('id', $this->admin->id)->update([
            'email' => $this->email
        ]);
        return Session::flash('updated_email', 'admin\'s email updated successfully');
    }
    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|string|min:8',
            're_password' => 'required|string|min:8|same:password',
        ]);

        Admin::where('id', $this->admin->id)->update([
            'password' => Hash::make($this->password)
        ]);
        return Session::flash('updated_password', 'admin\'s password updated successfully');
    }
    public function updateUsername()
    {
        $this->validate([
            'username' => 'required|string|unique:admins,username|max:255',
        ]);

        Admin::where('id', $this->admin->id)->update([
            'username' => $this->username
        ]);
        return Session::flash('updated_username', 'admin\'s username updated successfully');
    }
    public function updatePicture()
    {
        $get_old_picture = Admin::findOrFail($this->admin->id);
        if ($get_old_picture->picture ==  'admin/admin/photo/default.jpg') {
            // update the photo if picture was  admin/admin/photo/default.jpg and keep default.jpg 
            $this->validate([
                'picture' => 'required|image|max:1024', // 1MB Max
            ]);
            Admin::where('id', $this->admin->id)->update([
                'picture' => $this->picture->store('admin/admin/photo', 'public')
            ]);
        } else {
            // update the photo if picture was admin/admin/photo/default.jpg and delete the old one
            $this->validate([
                'picture' => 'required|image|max:1024', // 1MB Max
            ]);
            $get_old_picture = Admin::findOrFail($this->admin->id);
            unlink('storage/' . $get_old_picture->picture);
            Admin::where('id', $this->admin->id)->update([
                'picture' => $this->picture->store('admin/admin/photo', 'public')
            ]);
        }
        return Session::flash('updated_picture', 'admin\'s picture updated successfully');
    }

    public function updateAddress()
    {
        $this->validate([
            'address' => 'required|string|max:255',
        ]);

        Admin::where('id', $this->admin->id)->update([
            'address' => $this->address
        ]);
        return Session::flash('updated_address', 'admin\'s address updated successfully');
    }
    public function updatePhone()
    {
        $this->validate([
            'phone' => 'required|string|max:20|unique:admins,phone',
        ]);

        Admin::where('id', $this->admin->id)->update([
            'phone' => $this->phone
        ]);
        return Session::flash('updated_phone', 'admin\'s phone updated successfully');
    }

    public function updateBirthdate()
    {
        $this->validate([
            'birthdate' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d')],
        ]);

        Admin::where('id', $this->admin->id)->update([
            'birthdate' => $this->birthdate
        ]);
        return Session::flash('updated_birthdate', 'admin\'s birthdate updated successfully');
    }
    public function updateStatus()
    {
        $this->validate([
            'status' => 'required|in:active,inactive|string',
        ]);

        Admin::where('id', $this->admin->id)->update([
            'status' => $this->status
        ]);
        return Session::flash('updated_status', 'admin\'s status updated successfully');
    }
}

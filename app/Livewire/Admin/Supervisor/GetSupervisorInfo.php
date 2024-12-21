<?php

namespace App\Livewire\Admin\Supervisor;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use App\Models\Supervisor\Supervisor;
use Illuminate\Support\Facades\Session;

class GetSupervisorInfo extends Component
{
    use WithFileUploads;
    public $supervisor, $name, $email, $re_email, $password, $re_password, $username, $picture, $address, $phone, $birthdate, $status, $ip_address;

    public function render()
    {
        return view('livewire.admin.supervisor.get-supervisor-info')->layout('components.layouts.admin.supervisor.get-supervisor-info');
    }

    public function mount($id)
    {
        $this->supervisor =  Supervisor::findOrFail($id);
    }

    public function updateName()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Supervisor::where('id', $this->supervisor->id)->update([
            'name' => $this->name
        ]);
        return Session::flash('updated_name', 'Supervisor\'s name updated successfully');
    }
    public function updateEmail()
    {
        $this->validate([
            'email' => 'required|email|unique:supervisors,email',
            're_email' => 'required|email|unique:supervisors,email|same:email',
        ]);

        Supervisor::where('id', $this->supervisor->id)->update([
            'email' => $this->email
        ]);
        return Session::flash('updated_email', 'Supervisor\'s email updated successfully');
    }
    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|string|min:8',
            're_password' => 'required|string|min:8|same:password',
        ]);

        Supervisor::where('id', $this->supervisor->id)->update([
            'password' => Hash::make($this->password)
        ]);
        return Session::flash('updated_password', 'Supervisor\'s password updated successfully');
    }
    public function updateUsername()
    {
        $this->validate([
            'username' => 'required|string|unique:supervisors,username|max:255',
        ]);

        Supervisor::where('id', $this->supervisor->id)->update([
            'username' => $this->username
        ]);
        return Session::flash('updated_username', 'Supervisor\'s username updated successfully');
    }
    public function updatePicture()
    {
        $get_old_picture = Supervisor::findOrFail($this->supervisor->id);
        if ($get_old_picture->picture ==  'admin/supervisor/photo/default.jpg') {
            // update the photo if picture was  admin/supervisor/photo/default.jpg and keep default.jpg 
            $this->validate([
                'picture' => 'required|image|max:1024', // 1MB Max
            ]);
            Supervisor::where('id', $this->supervisor->id)->update([
                'picture' => $this->picture->store('admin/supervisor/photo', 'public')
            ]);
        } else {
            // update the photo if picture was admin/supervisor/photo/default.jpg and delete the old one
            $this->validate([
                'picture' => 'required|image|max:1024', // 1MB Max
            ]);
            $get_old_picture = Supervisor::findOrFail($this->supervisor->id);
            unlink('storage/' . $get_old_picture->picture);
            Supervisor::where('id', $this->supervisor->id)->update([
                'picture' => $this->picture->store('admin/supervisor/photo', 'public')
            ]);
        }
        return Session::flash('updated_picture', 'Supervisor\'s picture updated successfully');
    }

    public function updateAddress()
    {
        $this->validate([
            'address' => 'required|string|max:255',
        ]);

        Supervisor::where('id', $this->supervisor->id)->update([
            'address' => $this->address
        ]);
        return Session::flash('updated_address', 'Supervisor\'s address updated successfully');
    }
    public function updatePhone()
    {
        $this->validate([
            'phone' => 'required|string|max:20|unique:supervisor,phone',
        ]);

        Supervisor::where('id', $this->supervisor->id)->update([
            'phone' => $this->phone
        ]);
        return Session::flash('updated_phone', 'Supervisor\'s phone updated successfully');
    }

    public function updateBirthdate()
    {
        $this->validate([
            'birthdate' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d')],
        ]);

        Supervisor::where('id', $this->supervisor->id)->update([
            'birthdate' => $this->birthdate
        ]);
        return Session::flash('updated_birthdate', 'Supervisor\'s birthdate updated successfully');
    }
    public function updateStatus()
    {
        $this->validate([
            'status' => 'required|in:active,inactive|string',
        ]);

        Supervisor::where('id', $this->supervisor->id)->update([
            'status' => $this->status
        ]);
        return Session::flash('updated_status', 'Supervisor\'s status updated successfully');
    }
}

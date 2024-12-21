<?php

namespace App\Livewire\Admin\Member;

use Livewire\Component;
use App\Models\Member\Member;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GetMemberInfo extends Component
{
    use WithFileUploads;
    public $member, $name, $email, $re_email, $password, $re_password, $username, $picture, $address, $phone, $birthdate, $status, $ip_address;

    public function render()
    {
        return view('livewire.admin.member.get-member-info')->layout('components.layouts.admin.member.get-member-info');
    }


    public function mount($id)
    {
        $this->member =  Member::findOrFail($id);
    }

    public function updateName()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Member::where('id', $this->member->id)->update([
            'name' => $this->name
        ]);
        return Session::flash('updated_name', 'Member\'s name updated successfully');
    }
    public function updateEmail()
    {
        $this->validate([
            'email' => 'required|email|unique:members,email',
            're_email' => 'required|email|unique:members,email|same:email',
        ]);

        Member::where('id', $this->member->id)->update([
            'email' => $this->email
        ]);
        return Session::flash('updated_email', 'Member\'s email updated successfully');
    }
    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|string|min:8',
            're_password' => 'required|string|min:8|same:password',
        ]);

        Member::where('id', $this->member->id)->update([
            'password' => Hash::make($this->password)
        ]);
        return Session::flash('updated_password', 'Member\'s password updated successfully');
    }
    public function updateUsername()
    {
        $this->validate([
            'username' => 'required|string|unique:members,username|max:255',
        ]);

        Member::where('id', $this->member->id)->update([
            'username' => $this->username
        ]);
        return Session::flash('updated_username', 'Member\'s username updated successfully');
    }
    public function updatePicture()
    {
        $get_old_picture = Member::findOrFail($this->member->id);
        if ($get_old_picture->picture ==  'admin/member/photo/default.jpg') {
            // update the photo if picture was  admin/member/photo/default.jpg and keep default.jpg 
            $this->validate([
                'picture' => 'required|image|max:1024', // 1MB Max
            ]);
            Member::where('id', $this->member->id)->update([
                'picture' => $this->picture->store('admin/member/photo', 'public')
            ]);
        } else {
            // update the photo if picture was admin/member/photo/default.jpg and delete the old one
            $this->validate([
                'picture' => 'required|image|max:1024', // 1MB Max
            ]);
            $get_old_picture = Member::findOrFail($this->member->id);
            unlink('storage/' . $get_old_picture->picture);
            Member::where('id', $this->member->id)->update([
                'picture' => $this->picture->store('admin/member/photo', 'public')
            ]);
        }
        return Session::flash('updated_picture', 'Member\'s picture updated successfully');
    }

    public function updateAddress()
    {
        $this->validate([
            'address' => 'required|string|max:255',
        ]);

        Member::where('id', $this->member->id)->update([
            'address' => $this->address
        ]);
        return Session::flash('updated_address', 'Member\'s address updated successfully');
    }
    public function updatePhone()
    {
        $this->validate([
            'phone' => 'required|string|max:20|unique:members,phone',
        ]);

        Member::where('id', $this->member->id)->update([
            'phone' => $this->phone
        ]);
        return Session::flash('updated_phone', 'Member\'s phone updated successfully');
    }

    public function updateBirthdate()
    {
        $this->validate([
            'birthdate' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d')],
        ]);

        Member::where('id', $this->member->id)->update([
            'birthdate' => $this->birthdate
        ]);
        return Session::flash('updated_birthdate', 'Member\'s birthdate updated successfully');
    }
    public function updateStatus()
    {
        $this->validate([
            'status' => 'required|in:active,inactive|string',
        ]);

        Member::where('id', $this->member->id)->update([
            'status' => $this->status
        ]);
        return Session::flash('updated_status', 'Member\'s status updated successfully');
    }
}

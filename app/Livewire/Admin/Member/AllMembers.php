<?php

namespace App\Livewire\Admin\Member;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Member\Member;
use Illuminate\Support\Facades\Session;

class AllMembers extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        return view('livewire.admin.member.all-members', [
            'all_members' => Member::where('email', 'LIKE',  '%' . $this->search . '%')
                ->orwhere('phone', 'LIKE',  '%' . $this->search . '%')
                ->paginate(4),
        ])->layout('components.layouts.admin.member.all-members');
    }
    public function queryString()
    {

        return [
            'search' => [
                'as' => 'q',
                'except' => ''
            ]
        ];
    }


    public function getinfo($id)
    {
        Member::where('id', $id)->get();
    }

    public function resetQuerystring()
    {
        $this->resetPage();
    }

    public function deleteMember($id)
    {
        Member::where('id', $id)->update([
            'status' => 'inactive'
        ]);
        Member::where('id', $id)->delete();
        return Session::flash('deleted_member', 'Member deleted successfully and moved to deleted members list');
    }
}

<?php

namespace App\Livewire\Admin\Admin;

use Livewire\Component;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class AllAdmins extends Component
{
    use WithPagination;
    public $search;
    
    public function render()
    {
        return view('livewire.admin.admin.all-admins', [
            'all_admins' => Admin::where('email', 'LIKE',  '%' . $this->search . '%')
                ->orwhere('phone', 'LIKE',  '%' . $this->search . '%')
                ->paginate(4),
        ])->layout('components.layouts.admin.admin.all-admins');
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
        Admin::where('id', $id)->get();
    }

    public function resetQuerystring()
    {
        $this->resetPage();
    }

    public function deleteAdmin($id)
    {
        // soft delete without deleting admin's picture
        // update status to inactive ... if you want restore admin back you need to updat status to active
        // admins still have their own pictures 
        // admin's picture will force delete form easre funciton in deleted admins component
        Admin::where('id', $id)->update([
            'status'=>'inactive'
        ]);
        Admin::where('id', $id)->delete();
        return Session::flash('deleted_admin','Admin deleted successfully and moved to deleted admins list');
    }
}

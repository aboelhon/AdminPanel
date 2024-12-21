<?php

namespace App\Livewire\Admin\Supervisor;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supervisor\Supervisor;
use Illuminate\Support\Facades\Session;

class AllSupervisors extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        return view('livewire.admin.supervisor.all-supervisors', [
            'all_supervisors' => Supervisor::where('email', 'LIKE',  '%' . $this->search . '%')
                ->orwhere('phone', 'LIKE',  '%' . $this->search . '%')
                ->paginate(4),
        ])->layout('components.layouts.admin.supervisor.all-supervisors');
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
        Supervisor::where('id', $id)->get();
    }

    public function resetQuerystring()
    {
        $this->resetPage();
    }

    public function deleteSupervisor($id)
    {
        Supervisor::where('id', $id)->update([
            'status' => 'inactive'
        ]);
        Supervisor::where('id', $id)->delete();
        return Session::flash('deleted_supervisor', 'Supervisor deleted successfully and moved to deleted supervisors list');
    }
}

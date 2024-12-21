<?php

namespace App\Livewire\Admin\Supervisor;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Supervisor\Supervisor;

class DeletedSupervisors extends Component
{
    public function render()
    {
        return view('livewire.admin.supervisor.deleted-supervisors', [
            'supervisors' => Supervisor::onlyTrashed()->get(),
        ])->layout('components.layouts.admin.supervisor.deleted-supervisors');
    }

    public function earse_admin($id)
    {

        $earse_picture = DB::table('supervisors')->where('id', $id)->get();
        $earse_picture->each(function ($q) use ($id) {
            if (!file_exists('storage/' . $q->picture)) {
                DB::table('supervisors')->where('id', $id)->delete();
            } else {
                if ($q->picture != 'admin/supervisor/photo/default.jpg') {
                    unlink('storage/' . $q->picture);
                    DB::table('supervisors')->where('id', $id)->delete();
                } else {
                    DB::table('supervisors')->where('id', $id)->delete();
                }
            }
        });
    }

    public function restore_admin($id)
    {
        Supervisor::withTrashed()->where('id', $id)->restore();
    }
}

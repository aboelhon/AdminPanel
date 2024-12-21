<?php

namespace App\Livewire\Admin\Admin;

use Livewire\Component;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\DB;

class DeletedAdmins extends Component
{
    public function render()
    {
        return view('livewire.admin.admin.deleted-admins', [
            'admins' => Admin::onlyTrashed()->get(),
        ])->layout('components.layouts.admin.admin.deleted-admins');
    }

    public function earse_admin($id)
    {

        $earse_picture = DB::table('admins')->where('id', $id)->get();
        $earse_picture->each(function ($q) use ($id) {
            if (!file_exists('storage/' . $q->picture)) {
                DB::table('admins')->where('id', $id)->delete();
            } else {
                if ($q->picture != 'admin/admin/photo/default.jpg') {
                    unlink('storage/' . $q->picture);
                    DB::table('admins')->where('id', $id)->delete();
                } else {
                    DB::table('admins')->where('id', $id)->delete();
                }
            }
        });
    }

    public function restore_admin($id)
    {
        Admin::withTrashed()->where('id', $id)->restore();
    }
}

<?php

namespace App\Livewire\Admin\Member;

use Livewire\Component;
use App\Models\Member\Member;
use Illuminate\Support\Facades\DB;

class DeletedMembers extends Component
{
    public function render()
    {
        return view('livewire.admin.member.deleted-members', [
            'members' => Member::onlyTrashed()->get(),
        ])->layout('components.layouts.admin.member.deleted-members');
    }
    public function earse_member($id)
    {

        $earse_picture = DB::table('members')->where('id', $id)->get();
        $earse_picture->each(function ($q) use ($id) {
            if (!file_exists('storage/' . $q->picture)) {
                DB::table('members')->where('id', $id)->delete();
            } else {
                if ($q->picture != 'admin/member/photo/default.jpg') {
                    unlink('storage/' . $q->picture);
                    DB::table('members')->where('id', $id)->delete();
                } else {
                    DB::table('members')->where('id', $id)->delete();
                }
            }
        });
    }

    public function restore_member($id)
    {
        Member::withTrashed()->where('id', $id)->restore();
    }
}

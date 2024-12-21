<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Adminlogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Admin\AddAdmin;
use App\Livewire\Admin\Admin\AllAdmins;
use Illuminate\Support\Facades\Session;
use App\Livewire\Admin\Member\AddMember;
use App\Livewire\Admin\Member\AllMembers;
use App\Livewire\Admin\Admin\GetAdminInfo;
use App\Livewire\Admin\Admin\DeletedAdmins;
use App\Livewire\Admin\Member\GetMemberInfo;
use App\Livewire\Admin\Member\DeletedMembers;
use App\Livewire\Admin\Supervisor\AddSupervisor;
use App\Livewire\Admin\Supervisor\AllSupervisors;
use App\Livewire\Admin\Supervisor\GetSupervisorInfo;
use App\Livewire\Admin\Supervisor\DeletedSupervisors;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware(['AdminMiddleware'])->group(function () {

    ############## Start Admin CRUD Routes
    Route::get('admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('admin/admin/add-admin', AddAdmin::class)->name('admin.add-admin');
    Route::get('admin/admin/all-admins', AllAdmins::class)->name('admin.all-admins');
    Route::get('admin/admin/get-admin-info/{id}', GetAdminInfo::class)->name('admin.get-admin-info');
    Route::get('admin/admin/deleted-admins', DeletedAdmins::class)->name('admin.deleted-admins');
    ############## End Admin CRUD Routes

    ############## Start Supervisor CRUD Routes
    Route::get('admin/supervisor/add-supervisor', AddSupervisor::class)->name('admin.add-supervisor');
    Route::get('admin/supervisor/all-supervisors', AllSupervisors::class)->name('admin.all-supervisors');
    Route::get('admin/supervisor/get-supervisor-info/{id}', GetSupervisorInfo::class)->name('admin.get-supervisor-info');
    Route::get('admin/supervisor/deleted-supervisors', DeletedSupervisors::class)->name('admin.deleted-supervisors');
    ############## End Supervisor CRUD Routes

    ############## Start Member CRUD Routes
    Route::get('admin/member/add-member', AddMember::class)->name('admin.add-member');
    Route::get('admin/member/all-members', AllMembers::class)->name('admin.all-members');
    Route::get('admin/member/get-member-info/{id}', GetMemberInfo::class)->name('admin.get-member-info');
    Route::get('admin/member/deleted-members', DeletedMembers::class)->name('admin.deleted-members');
    ############## End Member CRUD Routes



    Route::get('admin/logout', function () {
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect(route('admin.login'));
    })->name('admin.logout');
});


Route::get('/admin', function () { // redirect to login page
    return redirect(route('admin.login'));
});

Route::get('admin/login', Adminlogin::class)->name('admin.login');

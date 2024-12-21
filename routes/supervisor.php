<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Supervisor\Dashboard;
use Illuminate\Support\Facades\Session;
use App\Livewire\Supervisor\Supervisorlogin;


 
Route::get('/supervisor', function () { // redirect to login page
    return redirect(route('supervisor.login'));
});


Route::middleware(['SupervisorMiddleware'])->group(function(){

    Route::get('supervisor/dashboard', Dashboard::class)->name('supervisor.dashboard');
});





Route::get('supervisor/login', Supervisorlogin::class)->name('supervisor.login');


Route::get('supervisor/logout', function () {
    Auth::guard('supervisor')->logout();
    Session::flush();
    return redirect(route('supervisor.login'));
})->name('supervisor.logout');
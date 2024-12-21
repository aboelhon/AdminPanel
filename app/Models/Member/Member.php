<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'username', 'picture', 'address',  'phone', 'birthdate', 'role', 'status', 'by', 'ip_address'];
}

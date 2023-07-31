<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guard = "usersadmin";

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}

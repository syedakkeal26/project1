<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newuser extends Model
{
    use HasFactory;

    public function roles(){
        return $this->belongsToMany(Role::class,UserRole::class);
    }
}

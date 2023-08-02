<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public function getCompany(){
        return $this->hasOne(Company::class);
    }

    Public function getdevice(){
        return $this->hasMany(Device::class);
    }
}

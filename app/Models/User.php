<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $table = "useradmins";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'gender',
    ];

    public $appends=[
        'profile_image_url'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function getProfileImageUrlAttribute(){
        if($this->profile_picture){
            return asset('uploads/profile_images/'.$this->profile_picture);
        }
        else{
            return 'https://ui-avatars.com/api?background=random&name='.urlencode($this->name);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\BusinessInformation;
use App\Models\Gallery;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'business_type',
        'business_name'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function information()
    {
        return $this->hasOne(BusinessInformation::class)->latest();
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function getNameAttribute()
    {
        return $this->attributes['business_name'] ?? $this->attributes['name'];
    }

    public function getDefaultImageAttribute()
    {
        return $this->galleries->where('is_default', true);
    }
}

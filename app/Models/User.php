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

    protected $appends = ['default_image'];

    public function scopeVendor($query)
    {
        $query->where('type', 'Vendor');
    }

    public function scopeVerified($query)
    {
        $query->whereNotNull('email_verified_at');
    }


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
        return $this->galleries->where('is_default', true)->first();
    }

    public function scopeRestaurantAccounts($query)
    {
        return $query->where('type', 'Vendor')->where('business_type', 'Restaurant');
    }

    public function scopeBeachAccounts($query)
    {
        return $query->where('type', 'Vendor')->where('business_type', 'Beach Resort');
    }

    public function scopeProductAccounts($query)
    {
        return $query->where('type', 'Vendor')->where('business_type', 'Products and Delicacies');
    }
}

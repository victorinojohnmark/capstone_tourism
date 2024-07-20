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
        'contact_no',
        'password',
        'type',
        'business_type',
        'business_name',
        'is_on_hold',
        'facebook_url',
        'instagram_url',
        'twitter_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = [
        'default_image',
        'is_vendor',
        'is_tourist',
        'is_admin',
        'is_beach_resort_owner'
    ];

    protected static function boot() {
        parent::boot();

        static::deleting(function ($user) {
            $user->information()->delete();
            $user->galleries()->delete();
        });
    }

    public function scopeVendor($query)
    {
        $query->where('type', 'Vendor');
    }

    public function scopeNotOnHold($query)
    {
        $query->where('is_on_hold', 0);
    }

    public function scopeTourist($query)
    {
        $query->where('type', 'Tourist');
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

    public function reservations()
    {
        return $this->hasMany(Reservation::class,'user_id');
    }

    public function clientReservations()
    {
        return $this->hasMany(Reservation::class,'vendor_id');
    }

    public function getNameAttribute()
    {
        return $this->attributes['business_name'] ?? $this->attributes['name'];
    }

    public function getOriginalNameAttribute()
    {
        return $this->attributes['name'];
    }

    public function getDefaultImageAttribute()
    {
        return $this->galleries->where('is_default', true)->first();
    }

    public function getIsTouristAttribute()
    {
        return $this->type == 'Tourist';
    }

    public function getIsVendorAttribute()
    {
        return $this->type == 'Vendor';
    }

    public function getIsAdminAttribute()
    {
        return $this->type == 'Admin';
    }

    public function getIsBeachResortOwnerAttribute()
    {
        return $this->type == 'Vendor' && $this->business_type == 'Beach Resort';
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

    public function rooms()
    {
        return $this->hasMany(Room::class, 'vendor_id');
    }
}

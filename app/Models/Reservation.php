<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','vendor_id', 'room_id', 'guest_count', 'tour_type', 'check_in', 'check_out', 'is_approved'];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    public function vendor()
    {
        return $this->belongsTo(User::class,'vendor_id');
    }

    public function tourist()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getStatusAttribute()
    {
        if ($this->is_approved == 1) {
            return 'Approved';
        } else {
            return 'Pending';
        }
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'name', 'filename', 'is_default'];

    public function scopeRegular($query)
    {
        $query->where('is_default', false);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessInformation extends Model
{
    use HasFactory;

    protected $fillable = ['about_us_content', 'contact_no', 'contact_person', 'email_address', 'address'];
}

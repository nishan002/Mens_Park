<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlets';
    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'manager_name',
        'description',
        'image',
        'api_key',
        'location',
        'latitude',
        'longitute',
        'opening_time',
        'closing_time',
    ];
}

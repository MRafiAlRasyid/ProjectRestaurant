<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'no_hp',
        'tgl_booking',
        'table',
        'message',
    ];

}
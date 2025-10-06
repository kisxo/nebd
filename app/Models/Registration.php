<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        "fullName",
        "fatherName",
        "age",
        "dob",
        "address",
        "phone",
        "email",
        "school",
        "academy",
        "teacher",
        "event",
        "category",
        "payment_screenshot",
    ];

    protected $casts = [
        'dob' => 'date',
    ];
}

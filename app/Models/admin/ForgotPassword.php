<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgotPassword extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'avatar_url',
        'bio',
        'linkedin_url',
        'github_url',
        'email'
    ];
}

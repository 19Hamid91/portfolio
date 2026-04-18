<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon_url'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}

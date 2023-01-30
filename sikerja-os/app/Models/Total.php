<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function status()
    {
        return $this->belongsToMany(Status::class);
    }

    public function hitung()
    {
        return $this->belongsToMany(Hitung::class);
    }
}

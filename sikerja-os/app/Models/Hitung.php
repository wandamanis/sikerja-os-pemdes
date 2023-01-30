<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hitung extends Model
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

    public function kinerja()
    {
        return $this->belongsToMany(Kinerja::class);
    }
}

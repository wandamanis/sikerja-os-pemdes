<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kinerja extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subdit()
    {
        return $this->belongsTo(Subdit::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

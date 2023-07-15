<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }

    public function complete()
    {
        return $this->hasMany(Complete::class);
    }
}

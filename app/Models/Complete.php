<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complete extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function activities()
    {
        return $this->belongsTo(Activity::class);
    }
    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }
}

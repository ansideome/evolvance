<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $guarded = [];

    public function week()
    {
        return $this->belongsTo(Week::class);
    }
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}

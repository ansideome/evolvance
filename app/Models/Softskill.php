<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Softskill extends Model
{
    protected $guarded = [];

    public function bootcamps()
    {
        return $this->belongsToMany(Bootcamp::class);
    }
}

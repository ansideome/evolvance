<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $guarded = [];

    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class);
    }
    public function material()
    {
        return $this->hasOne(Material::class);
    }
    public function assignment()
    {
        return $this->hasOne(Assignment::class);
    }
}

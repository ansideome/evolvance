<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    protected $fillable = [
        "image",
        "name",
        "description",
        "start_date",
        "end_date",
        "price",
        "kuota",
        "tipe_pembelajaran",
        "bidang_pekerjaan",
    ];

    public function softskills()
    {
        return $this->belongsToMany(Softskill::class);
    }

    public function weeks()
    {
        return $this->hasMany(Week::class);
    }
}

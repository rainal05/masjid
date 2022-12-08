<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $guarded = [];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
}

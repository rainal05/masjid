<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    protected $guarded = [];

    public function berita()
    {
        return $this->hasOne(Berita::class);
    }
}

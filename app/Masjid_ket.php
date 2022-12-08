<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masjid_ket extends Model
{
    protected $table = 'masjid_kets';

    public function masjid()
    {
        return $this->hasOne(Masjid::class);
    }
}

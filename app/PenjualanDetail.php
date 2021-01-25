<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    public function sukucadang()
    {
        return $this->belongsTo(Sukucadang::class);
    }

    public function returpenjualan()
    {
        return $this->hasMany(ReturPenjualan::class);
    }
}

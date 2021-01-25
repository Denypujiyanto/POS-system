<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{




    public function details()
    {
        return $this->hasMany(PembelianDetail::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    

    public function getDates()
    {
        return [];
    }
    
}

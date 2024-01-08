<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'customer_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    protected $table = 'historiales'; // Nombre de la tabla de pacientes en tu base de datos
    protected $fillable = ['id', 'nombre', 'edad', 'diagnostico', 'fechaUltimaVisita'];
}

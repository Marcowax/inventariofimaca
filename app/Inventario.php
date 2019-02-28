<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $fillable = array('nombre_equipo', 'serial', 'marca', 'modelo', 'tipo', 'ubicacion'. 'departamento', 'fecha_registro');
}

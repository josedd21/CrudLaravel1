<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    //
    protected $fillable = ['nombre', 'apellido', 'correo','telefono'];
}

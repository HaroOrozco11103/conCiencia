<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /**
     * Relación hacia muchos alumnos
     * @return type
     */
    public function alumno()
    {
        return $this->hasMany('App\Alumno');
    }

    /**
     * Establece relación hacia un usuario
     * @return type
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

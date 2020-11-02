<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    /**
     * Relación hacia muchas asignaturas
     * @return type
     */
    public function asignatura()
    {
        return $this->hasMany('App\Asignatura');
    }
}

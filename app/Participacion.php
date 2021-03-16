<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    /**
     * Establece relación hacia un usuario
     * @return type
     */
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    /**
     * Establece relación hacia una dinamica
     * @return type
     */
    public function dinamica()
    {
        return $this->belongsTo(Dinamica::class);
    }
}

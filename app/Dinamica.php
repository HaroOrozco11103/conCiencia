<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinamica extends Model
{
    /**
     * Relación hacia muchas participaciones
     * @return type
     */
    public function participacion()
    {
        return $this->hasMany('App\Participacion');
    }
    
    /**
     * Establece relación hacia una asignatura
     * @return type
     */
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
}

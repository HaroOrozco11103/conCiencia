<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
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
     * Establece relación hacia un grupo
     * @return type
     */
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}

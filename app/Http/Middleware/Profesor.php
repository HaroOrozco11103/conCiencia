<?php

namespace App\Http\Middleware;

use Closure;
use App\Grupo;

class Profesor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::user())
        {
            $grupo = Grupo::where('user_id',\Auth::user()->id)->get();
            return redirect()->route('grupos.show', $grupo[0]->id);
        }

        return $next($request);
    }
}

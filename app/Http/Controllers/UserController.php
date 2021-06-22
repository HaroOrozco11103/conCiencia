<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Grupo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $grupo = Grupo::where('user_id',\Auth::user()->id)->get();
      if($grupo->all() == []) return redirect()->route('grupos.show', 1);
      else return redirect()->route('grupos.show', $grupo[0]->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = \Auth::user();
      return view('auth.register', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPsw($id)
    {
      $user = \Auth::user();
      return view('auth.passwords.reset', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = \Auth::user();
      $request->validate([
        'nombre' => 'required|string|max:50',
        'username' => 'required|string|min:5|max:25|unique:users,username,'.$id,
        'email' => 'required|string|email|max:50|unique:users,email,'.$id,
      ]);

      $user->nombre = $request->input('nombre');
      $user->username = $request->input('username');
      $user->email = $request->input('email');
      $user->save();

      return redirect()->route('users.edit', 'id')
        ->with([
            'mensaje' => 'Tu información ha sido actualizada exitosamente',
            'alert-class' => 'alert-warning'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePsw(Request $request, User $user)
    {
        $user = \Auth::user();
        $request->validate([
          'password' => 'required|string|min:8|max:30|confirmed',
          'oldPassword' => 'required|string|max:30',
        ]);

        if(Hash::check($request->oldPassword, $user->password))
        {
          $user->password = Hash::make($request->password);
          $user->save();
          return redirect()->route('users.edit', $user->id)
            ->with([
                'mensaje' => 'Tu contraseña ha sido actualizada exitosamente',
                'alert-class' => 'alert-warning'
            ]);
        }
        else
        {
          return redirect()->route('users.editPsw', $user->id)
            ->with([
                'mensaje' => 'Tu contraseña antigua no ha coincidido con el campo proporcionado',
                'alert-class' => 'alert-warning'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("inicio");
    }
}

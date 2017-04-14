<?php

namespace sisAdmin\Http\Controllers;

use Illuminate\Http\Request;

use sisAdmin\Http\Requests;
use DB;
use sisAdmin\User;
use Illuminate\Support\Facades\Redirect;
class MiDiaController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = DB::table('users')       
        ->join('empleados','empleados.name','=','users.name') 
        ->select('users.*','empleados.idEmpleados as idEmpleado')
        ->where('users.name','=',\Auth::user()->name)
        ->first();

        $designacion=DB::table('cronogramas')
        ->join('designaciones','designaciones.Cronogramas_idCronogramas','=','cronogramas.idCronogramas')
        ->where('designaciones.Empleados_idEmpleados','=',$usuario->idEmpleado)
        ->where('cronogramas.fecha','=',date('Y-m-d'))
        ->select('designaciones.*')
        ->first();

        return ($designacion);
    }
}

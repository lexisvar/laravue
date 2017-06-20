<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Clientes extends Model
{
    protected $table = 'banshee_cliente';
    protected $primaryKey = 'cliente_id';

    public static function get_all(){
        $clientes = DB::table('banshee_cliente')
            ->leftjoin('banshee_ciudad', 'banshee_ciudad.ciudad_id', '=', 'banshee_cliente.ciudad_id')
            ->select('*','banshee_ciudad.nombre as ciudad_nombre','banshee_cliente.nombre as nombre')
            ->get();

        return  $clientes;
    }

    public static function get_countries(){
        $paises = DB::table('banshee_pais')
            ->select('*')
            ->get();

        return  $paises;
    }
    public static function get_states($pais_id){
        $departamentos = DB::table('banshee_departamento')
            ->select('*')
            ->where("pais_id",$pais_id)
            ->get();

        return  $departamentos;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Departamentos;
use App\Ciudades;

class AdminController extends Controller
{
    function index(){

        $data['clientes'] = Clientes::all()->toArray();

        return view('dashboard',$data);
    }

    function clientes(){
        $data['clientes'] = Clientes::get_all()->toArray();
        $data['paises'] = Clientes::get_countries()->toArray();
        return view('clientes',$data);
    }
    function actualizar(Request $request){
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'nit' => 'required',
                'nombre' => 'required',
                'telefono' => 'required|numeric|digits_between:7,13',
                'cupo' => 'required|numeric',
                'saldo_cupo' => 'required|numeric',
                'porcentaje_visita' => 'required|numeric|min:0|max:100',
                'ciudad_id' => 'required',
            ],[
                'nit.required'=>'El campo nit no puede estar vacío',
                'nombre.required'=>'El campo nombre no puede estar vacío',
                'telefono.required'=>'El campo telefono no puede estar vacío',
                'cupo.required'=>'El campo cupo no puede estar vacío',
                'saldo_cupo.required'=>'El campo saldo_cupo no puede estar vacío',
                'porcentaje_visita.required'=>'El campo porcentaje_visita no puede estar vacío',
                'telefono.numeric'=>'El campo telefono debe ser numérico',
                'telefono.digits_between'=>'El campo telefono debe tener entre 7 a 13 dígitos',
                'cupo.numeric'=>'El campo cupo debe ser numérico',
                'ciudad_id.numeric'=>'El campo ciudad_id no puede estar vacío',
                'porcentaje_visita.numeric'=>'El campo porcentaje_visita, debe ser numérico',
                'porcentaje_visita.min'=>'El mínimo permitido para el campo porcentaje_visita es 0',
                'porcentaje_visita.max'=>'El máximo permitido para el campo porcentaje_visita es 100',

            ]);

            $cliente = new Clientes;
            $cliente->nit = md5($request->input('nit'));
            $cliente->nombre = $request->input('nombre');
            $cliente->direccion = $request->input('direccion');
            $cliente->telefono = $request->input('telefono');
            $cliente->cupo = $request->input('cupo');
            $cliente->saldo_cupo = $request->input('saldo_cupo');
            $cliente->porcentaje_visita = $request->input('porcentaje_visita');
            $cliente->ciudad_id = $request->input('ciudad_id');

            if($cliente->save()){
                $data['clientes'] = Clientes::get_all()->toArray();
                return json_encode(array('success'=>true,'message'=>'Registro Éxitoso','clientes'=>$data['clientes'],));
            }else{
                return json_encode(array('success'=>false,'message'=>'Registro No Éxitoso'));
            }
        }
    }

    public function departamentos($pais_id){
        if($departamentos = Departamentos::where("pais_id",$pais_id)->get()){
            return json_encode($departamentos->toArray());
        }else{
            echo 'error';
        }

    }

    public function ciudades($departamento_id){
        if($ciudades = Ciudades::where("departamento_id",$departamento_id)->get()){
            return json_encode($ciudades->toArray());
        }else{
            echo 'error';
        }
    }

}

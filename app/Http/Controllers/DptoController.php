<?php

namespace App\Http\Controllers;

use App\Models\Dpto;
use Illuminate\Http\Request;

class DptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Dpto::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = new Dpto();

        if ($departamento) {
            $departamento -> dpto = $request -> dpto;
            $departamento -> location = $request -> location;
            $departamento -> save();

            $response = array (
                'status' => 'success',
                'code' => 200,
                'message' => 'Registro creado correctamente'
            );

        } else {
            $response = array (
                'status' => 'error',
                'code' => 400,
                'message' => 'Error al guardar el registro'
            );
        }

        return $response;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dpto  $dpto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Dpto::findOrFail($id);
        $response = array (
            'status' => 'success',
            'code' => 200,
            'message' => 'Registros cargados correctamente'
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dpto  $dpto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $departamento = Dpto::where('id', $id)->update(
                [ 
                    'dpto' => $request->get('dpto'),
                    'location' => $request->get('location')
                ]
            );

            $response = array (
                'status' => 'success',
                'code' => 200,
                'message' => 'Registro actualizado'
            );
        
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dpto  $dpto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Dpto::findOrFail($id);

        if($departamento -> delete()){
            $response = array (
                'status' => 'success',
                'code' => 200,
                'message' => 'Registro eliminado correctamente!'
            );
        }else {
           $response = array (
                'status' => 'error',
                'code' => 400,
                'message' => 'Error al eliminar departamento!'
            );
        }
        return $response;
    }
}

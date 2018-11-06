<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with('dpto')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $validateData = $request -> validate([
            'uid' => 'required|unique:users'
        ]);

        if ($user) {
            $user -> uid = $request -> uid;
            $user -> username = $request -> username;
            $user -> email = $request -> email;
            $user -> urlavatar = $request -> urlavatar;
            $user -> dpto_id = '32';
            $user -> save();
            $response = array (
                'status' => 'success',
                'code' => 200,
                'message' => 'Perfil guardado'
            );
        } else {
            $response = array (
                'status' => 'error',
                'code' => 400,
                'message' => 'Error al guadar usuario'
            );
        }
        return $response;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userid = User::with('dpto')->find($id);
        if (!is_null($userid)) {
           $response = array (
                'status' => 'error',
                'code' => 400,
                'message' => 'Error'
            );
        } else {
            return $userid;
            $response = array (
                'status' => 'success',
                'code' => '200',
                'message' => 'ID encontrado!'
            );
        }
        
        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Users::where('uid', $id)->update(
            [
                'dpto_id' => $request -> get('dpto_id')
            ]
        );

        $response = array (
                'status' => 'success',
                'code' => 200,
                'message' => 'Perfil actualizado'
            );

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user -> delete()){
            $response = array (
                'status' => 'success',
                'code' => 200,
                'message' => 'Registro eliminado correctamente!'
            );
        }else {
           $response = array (
                'status' => 'error',
                'code' => 400,
                'message' => 'Error al eliminar registro!'
            );
        }
        return $response;
    }
}

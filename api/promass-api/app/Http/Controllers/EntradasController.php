<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entradas = Entradas::all();

        $data = [
            "data" => $entradas,
            "status" => 200
        ];
        return response()->json($data, 200);
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
        $titulo = $request->input('titulo');
        $autor = $request->input('autor');
        $fecha = Carbon::now('America/Mexico_City');
        $contenido = $request->input('contenido');


        $entradas = Entradas::create([
            "titulo" => $titulo,
            "autor" => $autor,
            "fecha" => $fecha,
            "contenido" => $contenido
        ]);

        if($entradas){
            $data = [
                "data" => $entradas,
                "status" => 200
            ];
            return response()->json($data, 200);
        }


        $data= [
            "message" => "error al crear el registro ",
            "status" => 400
        ];

        return response()->json( $data,400);

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
        $entrada = Entradas::where("id",$id)->first();

        if($entrada){

            $data = [
                "data" => $entrada,
                "status" => 200
            ];

            return response()->json($data, 200);
        }

        $data= [
            "message" => "No se encontro el registro",
            "status" => 400
        ];

        return response()->json( $data,400);

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
        //
        $entrada = Entradas::findOrFail($id);

        if($entrada){

            $entrada->update($request->all());

            $data = [
                "data" => $entrada,
                "status" => 200
            ];

            return response()->json($data, 200);

        }

        $data = [
            "data" => "error al actualiar registro",
            "status" => 400
        ];

        return response()->json($data, 200);

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
        $entrada = Entradas::find($id);

        if($entrada){
            $entrada->delete();

            $data = [
                "data" => "el registro se elimino correctamente",
                "status" => 200
            ];

            return response()->json($data, 200);
        }

        $data = [
            "message" => "Error: no se pudo eliminar el registro"
        ];

        return response()->json($data, 200);
    }

    public function search(Request $request)
    {
        $word = $request->input('word');

        $entrada = Entradas::where("titulo",'like', '%' . $word . '%')->orWhere("autor",'like', '%' . $word . '%')->orWhere("contenido",'like', '%' . $word . '%')->get();

        if($entrada){

            $data = [
                "data" => $entrada,
                "status" => 200
            ];

            return response()->json($data, 200);
        }

        $data= [
            "message" => "No se encontro el registros",
            "status" => 400
        ];

        return response()->json( $data,400);
    }
}

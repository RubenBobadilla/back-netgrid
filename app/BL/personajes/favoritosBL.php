<?php

namespace App\BL\personajes;

use App\AO\personajes\favoritosAO;
use App\Models\personajes\Favoritos;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class favoritosBL
{
    /**
     * Crea un personaje favorito 
     */
    public static function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'ref_api' => 'required|string',            
        ]);

        //Si falla la validación
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400,);
        }

        $userid = auth()->id();  // Usuario 

        // Asignar datos al nuevo Objeto FAvoritos
        $favoSend = new Favoritos();
        $favoSend->id_usuario = $userid;
        $favoSend->ref_api = $request->ref_api;

        
        try {

            // Usar el AO:: para almacenar el objeto asignado
            $res = favoritosAO::store($favoSend);

            // Si todo sale bien retornar msn de exito
            if ($res) {
                return response()->json([
                    'message' => 'Se guardo exitosamente como favorito el personaje seleccionado!',
                    'data' => $res
                ], Response::HTTP_OK);
            }

        } catch (QueryException $e) {

            return response()->json([
                dd($e->getMessage()),
            ], 500);
        }



    }
}

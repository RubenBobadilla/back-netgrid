<?php

namespace App\Http\Controllers\personajes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\BL\personajes\favoritosBL;

class FavoritosController extends Controller
{
    /**
     * Valida si viene el token para la autenticación.
     */
    protected $user;

    public function __construct(Request $request)
    {
        $token = $request->header('Authorization');
        if ($token != '') {
            $this->user = JWTAuth::parseToken()->authenticate();
            $userdatas = $this->user;
        }
    }

     /**
     * Almacena el personaje favorito de un usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $response = favoritosBL::store($request);

        return $response;
    }
}

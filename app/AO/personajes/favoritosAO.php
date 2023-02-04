<?php

namespace App\AO\favoritos;

use App\Models\personajes\Favoritos;

class favoritosAO
{
     /**
     * Almacena el personaje favorito del User
     */
    public static function store($favoSend)
    {

        //$res = DB::table('favoritos')
          // ->insert($favoSend);

         $res =   DB::table('favoritos')->insert([
            'id_usuario' => 5,
            'ref_api' => 'pruebawwwwq',
           ]);

        return $res;

    }
}

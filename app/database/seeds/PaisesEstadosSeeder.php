<?php
/**
 * Created by PhpStorm.
 * User: leandro.piscke
 * Date: 10/07/14
 * Time: 13:09
 */

class PaisesEstadosSeeder extends Seeder{

    public function run()
    {
        DB::table('estados')->delete();
        DB::table('paises')->delete();

        $brasil = new Pais();
        $brasil->nome = 'Brasil';
        $brasil->pontos = 10;
        $brasil->save();

        $argentina = new Pais();
        $argentina->nome = 'Argentina';
        $argentina->pontos = 8;
        $argentina->save();

        $estado = new Estado();
        $estado->nome = 'Santa Catarina';
        $estado->pais_id = $brasil->id;
        $estado->save();

        $estado = new Estado();
        $estado->nome = 'Paraná';
        $estado->pais_id = $brasil->id;
        $estado->save();
    }

}
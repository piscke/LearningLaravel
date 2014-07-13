<?php
/**
 * Created by PhpStorm.
 * User: leandro.piscke
 * Date: 10/07/14
 * Time: 13:09
 */

class UsuariosSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->name = 'Leandro Salvatti Piscke';
        $user->email = 'piscke@gmail.com';
        $user->save();

        $user = new User();
        $user->name = 'Ana Carolina Galliani Piscke';
        $user->email = 'carolinagalliani@gmail.com';
        $user->save();

        $user = new User();
        $user->name = 'Davi Galliani Piscke';
        $user->email = 'davi@piscke.com';
        $user->save();

        $user = new User();
        $user->name = 'Jonatas Galliani Piscke';
        $user->email = 'jonatas@piscke.com';
        $user->save();

    }

}
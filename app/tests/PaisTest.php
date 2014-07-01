<?php

use Illuminate\Database;
use Illuminate\Database\Schema\Blueprint;

class PaisTest extends TestCase {
    public function setUp()
    {
        parent::setUp();

        Schema::create('paises', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nome');
            $table->timestamps();
        });

        $pais = new Pais();
        $pais->nome = 'Brasil';
        $pais->save();

        $pais = new Pais();
        $pais->nome = 'Argentina';
        $pais->save();
    }

    public function testa_se_brasil_exite()
    {
        $brasil = Pais::where('nome', '=', 'Brasil')->first();
        $this->assertTrue($brasil->nome == 'Brasil');
    }

    public function testa_se_argentina_exite()
    {
        $argentina = Pais::where('nome', '=', 'Argentina')->first();
        $this->assertTrue($argentina->nome == 'Argentina');
    }


    public function tearDown() {
        parent::tearDown();

        Schema::drop("paises");
    }
}

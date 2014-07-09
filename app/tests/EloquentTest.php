<?php

use Illuminate\Database;
use Illuminate\Database\Schema\Blueprint;

class EloquentTest extends TestCase {
    public function setUp()
    {
        parent::setUp();

        Schema::create('paises', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nome');
            $table->integer('pontos');
            $table->timestamps();
        });

        Schema::create('estados', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nome');
            $table->integer('pais');
            $table->foreign('pais')->references('id')->on('paises');
            $table->timestamps();
        });


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
        $estado->pais = $brasil->id;
        $estado->save();

        $estado = new Estado();
        $estado->nome = 'Paraná';
        $estado->pais = $brasil->id;
        $estado->save();

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

    public function testa_count()
    {
        $this->assertTrue(Pais::count() == 2);
    }

    public function testa_count_sqlite_arquivo()
    {
        $this->assertTrue(Pais::on('test-file')->count() == 4);
    }

    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testa_findOrFail()
    {
        $model = Pais::findOrFail(10);
    }

    public function testa_count_estados_do_brasil()
    {
        $brasil = Pais::where('nome', '=', 'Brasil')->first();

        $this->assertTrue($brasil->estados()->count() == 2);
    }

    public function testa_santa_catarina_existe()
    {
        $this->assertTrue(Estado::where('nome', '=', 'Santa Catarina')->exists());
    }

    public function testa_santa_catarina_pertence_ao_brasil()
    {
        $santacatarina = Estado::where('nome', '=', 'Santa Catarina')->first();
        $this->assertTrue($santacatarina->pais()->first()->nome == "Brasil");
    }

    public function tearDown() {
        parent::tearDown();

        Schema::drop("paises");
    }
}

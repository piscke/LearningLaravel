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

        $pais = new Pais();
        $pais->nome = 'Brasil';
        $pais->pontos = 10;
        $pais->save();

        $pais = new Pais();
        $pais->nome = 'Argentina';
        $pais->pontos = 8;
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

    public function tearDown() {
        parent::tearDown();

        Schema::drop("paises");
    }
}

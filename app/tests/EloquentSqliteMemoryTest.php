<?php

use Illuminate\Database;
use Illuminate\Database\Schema\Blueprint;

class EloquentSqliteMemoryTest extends TestCase {
    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');

        $this->seed('PaisesEstadosSeeder');
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
        $this->assertTrue($santacatarina->pais->nome == "Brasil");
    }

    public function tearDown() {
        parent::tearDown();

        Artisan::call('migrate', ['reset']);
    }
}

<?php

use Illuminate\Database;
use Illuminate\Database\Schema\Blueprint;

class EloquentSqliteFileTest extends Illuminate\Foundation\Testing\TestCase {

    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing_sqlite_file';

        return require __DIR__.'/../../bootstrap/start.php';
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

    public function testa_se_alemanha_exite()
    {
        $alemanha = Pais::where('nome', '=', 'Alemanha')->first();
        $this->assertTrue($alemanha->nome == 'Alemanha');
    }

    public function testa_count_sqlite_arquivo()
    {
        $this->assertTrue(Pais::count() == 5);
    }
}

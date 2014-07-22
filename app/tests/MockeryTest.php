<?php

class MockeryTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
    public function testa_somar_memoria_mockery()
    {
        Calculadora::shouldReceive('somarMemoria')->once()->andReturn(4);

        $this->assertEquals(4, Calculadora::somarMemoria());
    }

    public function testa_somar_memoria_mockery_times()
    {
        Calculadora::shouldReceive('somarMemoria')->times(3)->andReturn(4, 10, 22);

        $this->assertEquals(4, Calculadora::somarMemoria());
        $this->assertEquals(10, Calculadora::somarMemoria());
        $this->assertEquals(22, Calculadora::somarMemoria());
    }

}

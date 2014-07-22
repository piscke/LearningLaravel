<?php

use Piscke\Facades\Calculadora;

class CalculadoraTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testa_soma()
	{
        $this->assertEquals(3, Calculadora::somar(1,2));
	}

    public function testa_subtracao()
    {
        $this->assertEquals(1, Calculadora::subtrair(2,1));
    }

    public function testa_somar_memoria()
    {
        Calculadora::somar(1, 1);
        Calculadora::somar(1, 1);
        Calculadora::somar(1, 1);
        Calculadora::somar(1, 1);

        $this->assertEquals(8, Calculadora::somarMemoria());
    }
}

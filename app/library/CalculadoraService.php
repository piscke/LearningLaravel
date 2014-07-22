<?php
/**
 * Created by PhpStorm.
 * User: leandro.piscke
 * Date: 21/07/14
 * Time: 13:05
 */

namespace Piscke;


class Calculadora {

    public $memoria = array();

    public function somar($valor1, $valor2, $usarMemoria = true){
        $resultado = $valor1 + $valor2;

        if ($usarMemoria)
            array_push($this->memoria, $resultado);

        return $resultado;
    }

    public function subtrair($valor1, $valor2){
        return $valor1 - $valor2;
    }

    public function limpaMemoria(){
        unset($memoria);
    }

    public function somarMemoria(){
        $resultado = 0;

        foreach ($this->memoria as $valor)
            $resultado = $this->somar($resultado, $valor, false);

        return $resultado;
    }
}
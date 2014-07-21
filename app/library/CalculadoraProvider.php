<?php
/**
 * Created by PhpStorm.
 * User: leandro.piscke
 * Date: 21/07/14
 * Time: 13:10
 */

namespace Piscke;

use Illuminate\Support\ServiceProvider;

class CalculadoraProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('calculadora', function()
        {
            return new Calculadora();
        });
    }

} 
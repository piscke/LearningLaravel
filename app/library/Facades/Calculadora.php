<?php
/**
 * Created by PhpStorm.
 * User: leandro.piscke
 * Date: 21/07/14
 * Time: 13:19
 */


namespace Piscke\Facades;

use Illuminate\Support\Facades\Facade;

class Calculadora extends Facade {

    protected static function getFacadeAccessor() { return 'calculadora'; }

}
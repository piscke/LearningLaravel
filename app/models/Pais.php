<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 28/06/14
 * Time: 20:47
 */

class Pais extends Eloquent  {
    protected $table = 'paises';

    public function estados()
    {
        return $this->hasMany('Estado');
    }
} 
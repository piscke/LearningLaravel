<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 28/06/14
 * Time: 20:47
 */

class Estado extends Eloquent  {
    protected $table = 'estados';

    public function pais()
    {
        return $this->belongsTo('Pais');
    }
} 
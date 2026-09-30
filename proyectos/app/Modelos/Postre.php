<?php

namespace Cafeteria\Modelos;

use Cafeteria\Enums\Tamano;

 class Postre extends Producto{

    public function __construct($nombre, $preciobase){
        parent::__construct($nombre, $preciobase);
    }


    public function precioFinal(int $cantidad): float{
        if($cantidad >= 3){
            return ($this->preciobase*$cantidad)*0.9;
        }else{
            return ($this->preciobase*$cantidad);
        }
    }

}
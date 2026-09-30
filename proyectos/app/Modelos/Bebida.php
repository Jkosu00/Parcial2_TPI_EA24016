<?php

namespace Cafeteria\Modelos;

use Cafeteria\Enums\Tamano;

 class Bebida extends Producto{

    public function __construct($nombre, $preciobase, public Tamano $tamano){
        parent::__construct($nombre, $preciobase);
    }


    public function precioFinal(int $cantidad): float{
        return ($this->preciobase+$this->tamano->recargo())*$cantidad;
    }

}
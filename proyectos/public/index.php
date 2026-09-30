<?php

use Cafeteria\Controladores\PedidosControlador;

require __DIR__ ."../vendor";

$service = new PedidosControlador();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $service ->calcular();
}else{
    $service -> formulario();
}
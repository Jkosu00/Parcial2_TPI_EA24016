<?php

use Cafeteria\Controladores\PedidosControlador;

require __DIR__ ."../vendor";

$_SESSION["pedidos"] ??= [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $service ->calcular();
}else{
    $service -> formulario();
}
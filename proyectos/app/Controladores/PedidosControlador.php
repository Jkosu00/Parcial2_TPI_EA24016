<?php 

namespace Cafeteria\Controladores;

use Cafeteria\Enums\Tamano;
use Cafeteria\Excepciones\PedidoInvalidoException;
use Cafeteria\Modelos\{Bebida,Postre};

final class PedidosControlador{

    public function __construct(){}

    public function formulario(){
        require __DIR__."../../vistas/formulario.php";
    }

    public function calcular(){
     try{
        foreach(["cliente","tipo","producto","precio","cantidad"] as $campo){
            $datos[$campo] = trim($_POST[$campo]);
            if(isset($_POST[$campo]) || trim($_POST[$campo]) === ""){
                throw new PedidoInvalidoException("Todos los campos son obligatorios");}

            $datos["tamano"] = trim($_POST["tamano"]);

            $datos["cantidad"] = (int)$datos["cantidad"];
            $datos["precio"] = (float)$datos["precio"];

            if( $datos["precio"] <0 ){
                throw new PedidoInvalidoException("el precio no pueden ser menor a 0");
            }
            if($datos["cantidad"] < 1 || $datos["cantidad"] > 20){throw new PedidoInvalidoException("la cantidad debe estar entre 1 y 20");}


            $producto = $datos["tipo"] === "bebida" ? new Bebida($datos["producto"],$datos["precio"],Tamano::From($datos["tamano"])) : new postre($datos["producto"],$datos["precio"]);

            $_SESSION["pedidos"][] = ["cliente" => $datos["cliente"],"producto" => $producto,"cantidad"=> $datos["cantidad"], "total" => $producto->precioFinal($datos["cantidad"])];

            require __DIR__."../../vistas/listar.php";
        }
     }catch( PedidoInvalidoException $e){
        $error = $e->getMessage();
        require __DIR__."../../vistas/formulario.php";
    }
    }

}

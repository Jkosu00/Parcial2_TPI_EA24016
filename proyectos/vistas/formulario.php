<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="" hrel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input name="cliente" type="text" placeholder="nombre del cliente">
        <label>
            Tipo de pedido:<br>
            Bebida: <input type="radio" name="tipo" value="bebida">
            Postre: <input type="radio" name="tipo" value="postre">
        </label>

        <input name="producto" type="text" placeholder="nombre del producto">
        <input type="number" name="precio" placeholder="precio base">
        <input type="number" name="cantidad" placeholder="cantidad">

        <select name="tamano">
        <?php

        use Cafeteria\Enums\Tamano;

        foreach (Tamano::cases() as $value): ?>


        <?php endforeach; ?>

        </select>
        <button>pedir</button>
    </form>
</body>
</html>
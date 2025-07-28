<?php
include("../connection.php");

$sql= "SELECT * FROM compra";
$result= mysqli_query($connection, $sql);

$sql= "SELECT * FROM producto";
$result2= mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar detalle</title>
</head>
<body>
    <h1>Registrar detalle</h1>

    <form action="../detail/processDetailRegistration.php" method="post">
        <label>Compra:</label>
        <select name="cod_compra">
            <option value="">---Seleccione una opción---</option>
            <?php while($buys= mysqli_fetch_assoc($result)){
                echo "<option value={$buys['cod_compra']}>{$buys['cod_compra']}</option>";
            } ?>
        </select><br><br>

        <label>Producto:</label>
        <select name="cod_producto">
            <option value="">---Seleccione una opción---</option>
            <?php while($product= mysqli_fetch_assoc($result2)){
                echo "<option value={$product['cod_producto']}>{$product['nombre']}</option>";
            } ?>
        </select><br><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" min="1" required><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
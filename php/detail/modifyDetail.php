<?php
include("../connection.php");

$cod_detalle= $_GET['cod_detalle'];
$sql= "SELECT * FROM detallecompra";
$resultDetail= mysqli_query($connection, $sql);
$detail= mysqli_fetch_assoc($resultDetail);

$sql= "SELECT * FROM compra";
$resultBuys= mysqli_query($connection, $sql);

$sql= "SELECT * FROM producto";
$resultProduct= mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
    <h1>Acualizar detalle</h1>

    <form action="../detail/saveChanges.php" method="post">
        <input type="hidden" name="cod_detalle" value="<?php echo $detail['cod_detalle'] ?>">

        <label>Compra:</label>
        <select name="cod_compra">
            <option value="<?php echo $detail['cod_compra'] ?>">---Seleccione una opción---</option>
            <?php while($buys= mysqli_fetch_assoc($resultBuys)){
                echo "<option value={$buys['cod_compra']}>{$buys['cod_compra']}</option>";
            } ?>
        </select><br><br>

        <label>Producto:</label>
        <select name="cod_producto">
            <option value="">---Seleccione una opción---</option>
            <?php while($product= mysqli_fetch_assoc($resultProduct)){
                echo "<option value={$product['cod_producto']}>{$product['nombre']}</option>";
            } ?>
        </select><br><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" min="1" value="<?php echo $detail['cantidad'] ?>"><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../detail/detailList.php">Volver</a>
</body>
</html>
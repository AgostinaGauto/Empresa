<?php
include("../connection.php");

$cod_cliente= $_POST['cod_cliente'];
$sql= "SELECT p.*
FROM producto p
INNER JOIN detallecompra dc ON p.cod_producto= dc.cod_producto
INNER JOIN compra c ON dc.cod_compra= c.cod_compra
INNER JOIN cliente cl ON c.cod_cliente= cl.cod_cliente
WHERE cl.cod_cliente= '$cod_cliente'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos solicitados según cliente</title>
</head>
<body>
    <h1>Listado de productos solicitados según cliente</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio unitario</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Proveedor</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['cod_producto'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['punitario'] ?></td>
                        <td><?php echo $row['categoria'] ?></td>
                        <td><?php echo $row['stock'] ?></td>
                        <td><?php echo $row['cod_proveedor'] ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../product/clientProductList.php">Volver</a>
</body>
</html>
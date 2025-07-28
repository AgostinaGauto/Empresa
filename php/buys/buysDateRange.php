<?php
include("../connection.php");

echo "<p>Desde: $from</p>";
echo "<p>Hasta: $until</p>";

$sql= "SELECT cl.nomyape, c.fecha, c.forma_pago, c.total, dc.cantidad, p.nombre, p.punitario
FROM cliente cl
INNER JOIN compra c ON cl.cod_cliente= c.cod_cliente
INNER JOIN detallecompra dc ON c.cod_compra= dc.cod_compra
INNER JOIN producto p ON dc.cod_producto= p.cod_producto
WHERE c.fecha BETWEEN '$from' AND '$until'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de compras según rango de fecha</title>
</head>
<body>
    <h1>Listado de compras</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Fecha compra</th>
                    <th>Forma de pago</th>
                    <th>Total</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Precio unitario</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['nomyape'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['forma_pago'] ?></td>
                        <td><?php echo $row['total'] ?></td>
                        <td><?php echo $row['cantidad'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['punitario'] ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
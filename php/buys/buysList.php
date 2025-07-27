<?php
include("../connection.php");

$sql= "SELECT * FROM compra";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar compras</title>
</head>
<body>
    <h1>Listado de compras</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha</th>
                    <th>Forma de pago</th>
                    <th>Total</th>
                    <th>Cliente</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($buys= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $buys['cod_compra'] ?></td>
                        <td><?php echo $buys['fecha'] ?></td>
                        <td><?php echo $buys['forma_pago'] ?></td>
                        <td><?php echo $buys['total'] ?></td>
                        <td><?php echo $buys['cod_cliente'] ?></td>
                        <td><a href="../buys/modifyBuys.php?cod_compra=<?php echo $buys['cod_compra'] ?>">Modificar</a></td>
                        <td><a href="../buys/deleteBuys.php?cod_compra=<?php echo $buys['cod_compra'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>
    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
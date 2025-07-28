<?php
include("../connection.php");

$sql= "SELECT * FROM detallecompra";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar detalles</title>
</head>
<body>
    <h1>Listado de detalles</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Compra</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($detail= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $detail['cod_detalle'] ?></td>
                        <td><?php echo $detail['cod_compra'] ?></td>
                        <td><?php echo $detail['cod_producto'] ?></td>
                        <td><?php echo $detail['cantidad'] ?></td>
                        <td><a href="../detail/modifyDetail.php?cod_detalle=<?php echo $detail['cod_detalle'] ?>">Modificar</a></td>
                        <td><a href="../detail/deleteDetail.php?cod_detalle=<?php echo $detail['cod_detalle'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>
    
    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
    
</body>
</html>
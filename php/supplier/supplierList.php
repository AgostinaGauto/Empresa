<?php
include("../connection.php");

$sql= "SELECT * FROM proveedor";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar proveedores</title>
</head>
<body>
    <h1>Listado de proveedores</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Razón social</th>
                    <th>Dirección</th>
                    <th>Calidad</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($supplier= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $supplier['cod_proveedor'] ?></td>
                        <td><?php echo $supplier['razonsocial'] ?></td>
                        <td><?php echo $supplier['direccion'] ?></td>
                        <td><?php echo $supplier['calidad'] ?></td>
                        <td><a href="../supplier/modifySupplier.php?cod_proveedor=<?php echo $supplier['cod_proveedor'] ?>">Modificar</a></td>
                        <td><a href="../supplier/deleteSupplier.php?cod_proveedor=<?php echo $supplier['cod_proveedor'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>
    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
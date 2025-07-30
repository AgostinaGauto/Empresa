<?php
include("../connection.php");

$calidad= $_POST['calidad'];
$categoria= $_POST['categoria'];

$sql= "SELECT p.*
FROM producto p 
INNER JOIN proveedor pr ON p.cod_proveedor= pr.cod_proveedor
WHERE pr.calidad= '$calidad' AND p.categoria= '$categoria'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos según calidad de proveedor y categoria</title>
</head>
<body>
    <h1>Listado de productos según calidad de proveedor y categoria</h1>

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
    <a href="../../pages/productQualityCategory.html">Volver</a>
</body>
</html>
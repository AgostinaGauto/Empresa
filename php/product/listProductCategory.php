<?php
include("../connection.php");

$categoria= $_POST['categoria'];
$sql= "SELECT * FROM producto WHERE categoria= '$categoria'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar productos según categoria</title>
</head>
<body>
    <h1>Listado de productos según categoria</h1>

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
                <?php while($product= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $product['cod_producto'] ?></td>
                        <td><?php echo $product['nombre'] ?></td>
                        <td><?php echo $product['punitario'] ?></td>
                        <td><?php echo $product['categoria'] ?></td>
                        <td><?php echo $product['stock'] ?></td>
                        <td><?php echo $product['cod_proveedor'] ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../../pages/productCategory.html">Volver</a>
</body>
</html>
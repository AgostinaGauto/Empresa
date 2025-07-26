<?php
include("../connection.php");

$sql= "SELECT * FROM producto";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar productos</title>
</head>
<body>
    <h1>Listado de productos</h1>

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
                    <th colspan="2">Acciones</th>
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
                        <td><a href="../product/modifyProduct.php?cod_producto=<?php echo $product['cod_producto'] ?>">Modificar</a></td>
                        <td><a href="../product/deleteProduct.php?cod_producto=<?php echo $product['cod_producto'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
<?php
include("../connection.php");

$cod_producto= $_GET['cod_producto'];
$sql= "SELECT * FROM producto WHERE cod_producto= '$cod_producto'";
$result= mysqli_query($connection, $sql);
$product= mysqli_fetch_assoc($result);

$sql= "SELECT * FROM proveedor";
$result2= mysqli_query($connection, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
    <h1>Modificar producto</h1>

    <form action="../product/saveChanges.php" method="post">
        <input type="hidden" name="cod_producto" value="<?php echo $product['cod_producto'] ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $product['nombre'] ?>"><br><br>

        <label>Precio unitario:</label>
        <input type="number" name= "punitario" min= "1" value="<?php echo $product['punitario'] ?>"><br><br>

        <label>Categoria:</label>
        <input type="text" name="categoria" value="<?php echo $product['categoria'] ?>"><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="<?php echo $product['stock'] ?>"><br><br>

        <label>Proveedor:</label>
        <select name="cod_proveedor">
            <option value="<?php echo $product['cod_proveedor'] ?>">---Seleccione una opción---</option>
            <?php while($supplier= mysqli_fetch_assoc($result2)){
                echo "<option value= {$supplier['cod_proveedor']}>{$supplier['cod_proveedor']}</option>";
            } ?>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../product/productList.php">Volver</a>
</body>
</html>
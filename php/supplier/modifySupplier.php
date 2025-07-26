<?php
include("../connection.php");

$cod_proveedor= $_GET['cod_proveedor'];
$sql= "SELECT * FROM proveedor WHERE cod_proveedor= '$cod_proveedor'";
$result= mysqli_query($connection, $sql);
$supplier= mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar proveedor</title>
</head>
<body>
    <h1>Actualizar proveedor</h1>

    <form action="../supplier/saveChanges.php" method="post">
        <input type="hidden" name="cod_proveedor" value="<?php echo $supplier['cod_proveedor'] ?>">

        <label>Razón social:</label>
        <input type="text" name="razonsocial" value="<?php echo $supplier['razonsocial'] ?>"><br><br>

        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $supplier['direccion'] ?>"><br><br>

        <label>Calidad:</label>
        <input type="text" name="calidad" value="<?php echo $supplier['calidad'] ?>"><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../supplier/supplierList.php">Volver</a>
</body>
</html>
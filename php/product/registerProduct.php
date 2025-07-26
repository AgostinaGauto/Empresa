<?php
include("../connection.php");

$sql= "SELECT * FROM proveedor";
$result= mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
</head>
<body>
    <h1>Registrar producto</h1>

    <form action="../product/processProductRegistration.php" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Precio unitario:</label>
        <input type="number" name="punitario" min= '1'><br><br>

        <label>Categoria:</label>
        <input type="text" name="categoria" required><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" required><br><br>

        <label>Proveedor:</label>
        <select name="cod_proveedor">
            <option value="">---Seleccione una opción---</option>
            <?php while($supplier= mysqli_fetch_assoc($result)){
                echo "<option value= {$supplier['cod_proveedor']}>{$supplier['cod_proveedor']}</option>";
            } ?>
        </select><br><br>

        <button>Enviar</button>
    </form><br>
    
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
<?php
include("../connection.php");

$cod_cliente= $_GET['cod_cliente'];
$sql= "SELECT * FROM cliente WHERE cod_cliente= '$cod_cliente'";
$result= mysqli_query($connection, $sql);
$customer= mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
    <h1>Modificar cliente</h1>

    <form action="../customer/saveChanges.php" method="post">
        <input type="hidden" name="cod_cliente" value="<?php echo $customer['cod_cliente'] ?>">

        <label>Nombre completo:</label>
        <input type="text" name="nomyape" value="<?php echo $customer['nomyape'] ?>"><br><br>

        <label>DNI:</label>
        <input type="number" name="dni" value="<?php echo $customer['dni'] ?>"><br><br>

        <label>Direccion:</label>
        <input type="text" name="direccion" value="<?php echo $customer['direccion'] ?>"><br><br>

        <label>Ciudad:</label>
        <input type="text" name="ciudad" value="<?php echo $customer['ciudad'] ?>"><br><br>

        <label>Fecha de nacimiento:</label>
        <input type="date" name="fnacimiento" value="<?php echo $customer['fnacimiento'] ?>"><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../customer/clientList.php">Volver</a>
</body>
</html>
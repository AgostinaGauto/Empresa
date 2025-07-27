<?php
include("../connection.php");

$sql= "SELECT * FROM cliente";
$result= mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar compra</title>
</head>
<body>
    <h1>Registrar compra</h1>

    <form action="../buys/processBuysRegistration.php" method="post">
        <label>Fecha:</label>
        <input type="date" name="fecha" required><br><br>

        <label>Forma de pago:</label>
        <input type="text" name="forma_pago" required><br><br>

        <label>Total:</label>
        <input type="number" name="total" min= "0" required><br><br>

        <label>Cliente:</label>
        <select name="cod_cliente">
            <option value="">---Seleccione una opción---</option>
            <?php while($customer= mysqli_fetch_assoc($result)){
                echo "<option value={$customer['cod_cliente']}>{$customer['nomyape']}</option>";
            } ?>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
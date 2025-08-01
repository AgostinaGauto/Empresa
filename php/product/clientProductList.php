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
    <title>Listar producto según cliente</title>
</head>
<body>
    <h1>Seleccione un cliente</h1>

    <form action="../product/processProductClientList.php" method="post">
        <label>Cliente:</label>
        <select name="cod_cliente">
            <option value="">---Seleccione una opción---</option>
            <?php while($customer= mysqli_fetch_assoc($result)){
                echo "<option value= {$customer['cod_cliente']}>{$customer['nomyape']}</option>";
            } ?>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
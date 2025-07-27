<?php
include("../connection.php");

$cod_compra= $_GET['cod_compra'];
$sql= "SELECT * FROM compra WHERE cod_compra= '$cod_compra'";
$result= mysqli_query($connection, $sql);
$buys= mysqli_fetch_assoc($result);

$sql= "SELECT * FROM cliente";
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
    <h1>Actualizar compra</h1>

    <form action="../buys/saveChanges.php" method="post">
        <input type="hidden" name="cod_compra" value="<?php echo $buys['cod_compra'] ?>">

        <label>Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $buys['fecha'] ?>"><br><br>

        <label>Forma de pago:</label>
        <input type="text" name="forma_pago" value="<?php echo $buys['forma_pago'] ?>"><br><br>

        <label>Total:</label>
        <input type="number" name="total" value="<?php echo $buys['total'] ?>"><br><br>

        <label>Cliente:</label>
        <select name="cod_cliente">
            <option value="<?php echo $buys['cod_cliente'] ?>">---Seleccione una opción---</option>
            <?php while($customer= mysqli_fetch_assoc($result2)){
                echo "<option value={$customer['cod_cliente']}>{$customer['nomyape']}</option>";
            } ?>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../buys/buysList.php">Volver</a>
</body>
</html>
<?php
include("../connection.php");

$cod_cliente= $_POST['cod_cliente'];
$sql= "SELECT * FROM compra WHERE cod_cliente= '$cod_cliente'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de compras según cliente</title>
</head>
<body>
    <h1>Listado de compras según cliente</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha</th>
                    <th>Forma de pago</th>
                    <th>Total</th>
                    <th>Cliente</th>
                </tr>
            </thead>

            <tbody>
                <?php while($buys= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $buys['cod_compra'] ?></td>
                        <td><?php echo $buys['fecha'] ?></td>
                        <td><?php echo $buys['forma_pago'] ?></td>
                        <td><?php echo $buys['total'] ?></td>
                        <td><?php echo $buys['cod_cliente'] ?></td>
                    </tr>
                 <?php endwhile ?>   
            </tbody>
        </table><br>
    
    <?php endif ?>
    <a href="../buys/customerBuysList.php">Volver</a>
</body>
</html>
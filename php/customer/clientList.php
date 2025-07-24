<?php
include("../connection.php");

$sql= "SELECT * FROM cliente";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar clientes</title>
</head>
<body>
    <h1>Listado de clientes</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Dni</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($customer= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $customer['cod_cliente'] ?></td>
                        <td><?php echo $customer['nomyape'] ?></td>
                        <td><?php echo $customer['dni'] ?></td>
                        <td><?php echo $customer['direccion'] ?></td>
                        <td><?php echo $customer['ciudad'] ?></td>
                        <td><a href="../customer/modifyCustomer.php?cod_cliente=<?php echo $customer['cod_cliente'] ?>">Modificar</a></td>
                        <td><a href="../customer/deleteCustomer.php?cod_cliente=<?php echo $customer['cod_cliente'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>
    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
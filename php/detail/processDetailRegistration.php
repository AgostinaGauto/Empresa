<?php
include("../connection.php");

$cod_compra= $_POST['cod_compra'];
$cod_producto= $_POST['cod_producto'];
$cantidad= $_POST['cantidad'];

$sql= "SELECT * FROM producto WHERE cod_producto= '$cod_producto'";
$result= mysqli_query($connection, $sql);
$product= mysqli_fetch_assoc($result);
$amountP= $product['stock'];

if($amountP > $cantidad){
    $sql= "UPDATE producto SET stock= stock - '$cantidad' WHERE cod_producto= '$cod_producto'";
    $result2= mysqli_query($connection, $sql);

    $sql= "INSERT INTO detallecompra(cod_compra, cod_producto, cantidad)
    VALUES('$cod_compra', '$cod_producto', '$cantidad')";
    $result3= mysqli_query($connection, $sql);

    if($result3){
        echo "Se ha registrado el detalle de compra.";
        echo "<br><a href= '../../pages/menu.html'>Volver</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../../pages/menu.html'>Volver</a>";
    }

    $sql= "SELECT c.total, c.forma_pago, p.punitario
    FROM compra c
    INNER JOIN detallecompra dc ON c.cod_compra= dc.cod_compra
    INNER JOIN producto p ON dc.cod_producto= p.cod_producto
    WHERE c.cod_compra= '$cod_compra'";
    $result4= mysqli_query($connection, $sql);
    $row= mysqli_fetch_assoc($result4);
    $totalB= $row['total'];
    $pMethod= $row['forma_pago'];
    $uPrice= $row['punitario'];

    if($pMethod == 'Tarjeta'){
        $total= $cantidad * $uPrice;
        $surcharge= $total * 0.05;
        $total += $surcharge;

        $sql= "UPDATE compra SET total= '$total' WHERE cod_compra= '$cod_compra'";
        $updateResult= mysqli_query($connection, $sql);

    }else{
        $total= $cantidad * $uPrice;
        $discount= $total * 0.10;
        $total -= $discount;

        $sql= "UPDATE compra SET total= '$total' WHERE cod_compra= '$cod_compra'";
        $updateResult= mysqli_query($connection, $sql);
    }

}else{
    echo "No hay stock del producto seleccionado.";
    echo "<br><a href= '../buys/registerBuys.php'>Volver</a>";
}

?>
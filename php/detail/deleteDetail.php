<?php
include("../connection.php");

$cod_detalle= $_GET['cod_detalle'];
$sql= "SELECT c.total, dc.*, p.punitario, p.stock
FROM compra c
INNER JOIN detallecompra dc ON c.cod_compra= dc.cod_compra
INNER JOIN producto p ON dc.cod_producto
WHERE dc.cod_detalle= '$cod_detalle'";
$result= mysqli_query($connection, $sql);
$row= mysqli_fetch_assoc($result);

$total= $row['total'];
$unitPrice= $row['punitario'];
$stock= $row['stock'];
$buysCode= $row['cod_compra'];
$productCode= $row['cod_producto'];
$amount= $row['cantidad'];

$stock += $amount;
$sqlUpdate= "UPDATE producto SET stock= '$stock' WHERE cod_producto= '$productCode'";
$update= mysqli_query($connection, $sqlUpdate);

$subtract= $amount * $unitPrice;
$total -= $subtract;

if($total < 0){
    $total= 0;

}

$sql= "UPDATE compra SET total= '$total' WHERE cod_compra= '$buysCode'";
$updateProduct= mysqli_query($connection, $sql);

$sqlDelete= "DELETE FROM detallecompra WHERE cod_detalle= '$cod_detalle'";
$resultDelete= mysqli_query($connection, $sqlDelete);

if($resultDelete){
    echo "Se ha eliminado el detalle de compra.";
    echo "<br><a href= '../detail/detailList.php'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}
?>
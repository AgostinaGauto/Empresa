<?php
include("../connection.php");

$cod_compra= $_POST['cod_compra'];
$fecha= $_POST['fecha'];
$forma_pago= $_POST['forma_pago'];
$total= $_POST['total'];
$cod_cliente= $_POST['cod_cliente'];

$sql= "UPDATE compra SET fecha= '$fecha', forma_pago= '$forma_pago', total= '$total',
cod_cliente= '$cod_cliente' WHERE cod_compra= '$cod_compra'";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha actualizado la compra.";
    echo "<br><a href= '../buys/buysList.php'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a<";
}
?>
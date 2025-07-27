<?php
include("../connection.php");

$fecha= $_POST['fecha'];
$forma_pago= $_POST['forma_pago'];
$total= $_POST['total'];
$cod_cliente= $_POST['cod_cliente'];

$sql= "INSERT INTO compra(fecha, forma_pago, total, cod_cliente) 
VALUES('$fecha', '$forma_pago', '$total', '$cod_cliente')";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha registrado la compra.";
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}
?>
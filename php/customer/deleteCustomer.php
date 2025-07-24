<?php
include("../connection.php");

$cod_cliente= $_GET['cod_cliente'];
$sql= "SELECT * FROM compra WHERE cod_cliente= '$cod_cliente'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

if($amount >= 1){
    echo "No se puede eliminar un cliente asociado a una o varias compras.";
    echo "<br><a href= '../customer/clientList.php'>Volver</a>";

}else{
    $sql= "DELETE FROM cliente WHERE cod_cliente= '$cod_cliente'";
    $result2= mysqli_query($connection, $sql);

    if($result2){
        echo "Se ha eliminado el cliente.";
        echo "<br><a href= '../customer/clientList.php'>Volver</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../../pages/menu.html'>Volver</a>";
    }
}

?>
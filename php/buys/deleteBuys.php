<?php
include("../connection.php");

$cod_compra= $_GET['cod_compra'];
$sql= "SELECT * FROM detallecompra WHERE cod_compra= '$cod_compra'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

if($amount >= 1){
    echo "No se puede eliminar una compra asociada a un detalle.";
    echo "<br><a href= '../buys/buysList.php'>Volver</a>";

}else{
    $sql= "DELETE FROM compra WHERE cod_compra= '$cod_compra'";
    $result2= mysqli_query($connection, $sql);

    if($result2){
        echo "Se ha eliminado la compra.";
        echo "<br><a href= '../buys/buysList.php'>Volver</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../../pages/menu.html'>Volver</a>";
    }
}

?>
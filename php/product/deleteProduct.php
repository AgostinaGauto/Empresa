<?php
include("../connection.php");

$cod_producto= $_GET['cod_producto'];
$sql= "SELECT * FROM detallecompra WHERE cod_producto= '$cod_producto'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

if($amount >= 1){
    echo "No se puede eliminar un producto asociado a una compra.";
    echo "<br><a href= '../product/productList.php'>Volver</a>";

}else{
    $sql= "DELETE FROM producto WHERE cod_producto= '$cod_producto'";
    $result2= mysqli_query($connection, $sql);

    if($result2){
        echo "Se ha eliminado el producto.";
        echo "<br><a href= '../product/productList.php'>Volver</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../../pages/menu.html'>Volver</a>"; 
    }
}

?>
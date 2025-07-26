<?php
include("../connection.php");

$cod_proveedor= $_GET['cod_proveedor'];
$sql= "SELECT * FROM producto WHERE cod_proveedor= '$cod_proveedor'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

if($amount >= 1){
    echo "No se puede eliminar un proveedor asociado a un producto.";
    echo "<br><a href= '../supplier/supplierList.php'>Volver</a>";

}else{
    $sql= "DELETE FROM proveedor WHERE cod_proveedor= '$cod_proveedor'";
    $result= mysqli_query($connection, $sql);

    if($result){
        echo "Se ha eliminado el proveedor";
        echo "<br><a href= '../supplier/supplierList.php'>Volver</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../supplier/supplierList.php'>Volvr</a>";

    }
}
?>
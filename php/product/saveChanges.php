<?php
include("../connection.php");

$cod_producto= $_POST['cod_producto'];
$nombre= $_POST['nombre'];
$punitario= $_POST['punitario'];
$categoria= $_POST['categoria'];
$stock= $_POST['stock'];
$cod_proveedor= $_POST['cod_proveedor'];

$sql= "UPDATE producto SET nombre= '$nombre', punitario= '$punitario', categoria= '$categoria',
stock= '$stock', cod_proveedor= '$cod_proveedor' WHERE cod_producto= '$cod_producto'";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha actualizado el producto.";
    echo "<br><a href= '../product/productList.php'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../product/productList.php'>Volver</a>";
}
?>
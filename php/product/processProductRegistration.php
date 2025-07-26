<?php
include("../connection.php");

$nombre= $_POST['nombre'];
$punitario= $_POST['punitario'];
$categoria= $_POST['categoria'];
$stock= $_POST['stock'];
$cod_proveedor= $_POST['cod_proveedor'];

$sql= "INSERT INTO producto(nombre, punitario, categoria, stock, cod_proveedor)
VALUES('$nombre', '$punitario', '$categoria', '$stock', '$cod_proveedor')";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha registrado el producto.";
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href='../../pages/menu.html'>Volver</a>";
}

?>
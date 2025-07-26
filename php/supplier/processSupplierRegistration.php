<?php
include("../connection.php");

$razonsocial= $_POST['razonsocial'];
$direccion= $_POST['direccion'];
$calidad= $_POST['calidad'];

$sql= "INSERT INTO proveedor(razonsocial, direccion, calidad) VALUES('$razonsocial', '$direccion', '$calidad')";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha registrado el proveedor.";
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}


?>
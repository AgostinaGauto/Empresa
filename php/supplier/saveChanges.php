<?php
include("../connection.php");

$cod_proveedor= $_POST['cod_proveedor'];
$razonsocial= $_POST['razonsocial'];
$direccion= $_POST['direccion'];
$calidad= $_POST['calidad'];

$sql= "UPDATE proveedor SET razonsocial= '$razonsocial', direccion= '$direccion', calidad= '$calidad'
WHERE cod_proveedor= '$cod_proveedor'";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha actualizado el proveedor.";
    echo "<br><a href= '../supplier/supplierList.php'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}

?>
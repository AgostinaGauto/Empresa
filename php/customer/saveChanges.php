<?php
include("../connection.php");

$cod_cliente= $_POST['cod_cliente'];
$nomyape= $_POST['nomyape'];
$dni= $_POST['dni'];
$direccion= $_POST['direccion'];
$ciudad= $_POST['ciudad'];
$fnacimiento= $_POST['fnacimiento'];

$sql= "UPDATE cliente SET nomyape= '$nomyape', dni= '$dni', direccion= '$direccion',
ciudad= '$ciudad', fnacimiento= '$fnacimiento' WHERE cod_cliente= '$cod_cliente'";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se han actualizado los datos del cliente.";
    echo "<br><a href= '../customer/clientList.php'>Volver al listado</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}

?>
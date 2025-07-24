<?php
include("../connection.php");

$nomyape= $_POST['nomyape'];
$dni= $_POST['dni'];
$direccion= $_POST['direccion'];
$ciudad= $_POST['ciudad'];
$fnacimiento= $_POST['fnacimiento'];

$sql= "INSERT INTO cliente(nomyape, dni, direccion, ciudad, fnacimiento) VALUES('$nomyape', '$dni',
'$direccion', '$ciudad', '$fnacimiento')";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha registrado el cliente.";
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}
?>
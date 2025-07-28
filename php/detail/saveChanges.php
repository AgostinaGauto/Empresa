<?php
include("../connection.php");

$cod_detalle= $_POST['cod_detalle'];
$cod_compra= $_POST['cod_compra'];
$cod_producto= $_POST['cod_producto'];
$cantidad= $_POST['cantidad'];

$sql= "UPDATE detallecompra SET cod_compra= '$cod_compra', cod_producto= '$cod_producto',
cantidad= '$cantidad' WHERE cod_detalle= '$cod_detalle'";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha actualizado el detalle de compra.";
    echo "<br><a href= '../detail/detailList.php'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}

?>
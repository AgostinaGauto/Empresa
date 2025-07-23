<?php
session_start();
include("../php/connection.php");

$user= $_POST['user'];
$pass= $_POST['pass'];
$sql= "SELECT * FROM usuario WHERE user= '$user' AND pass= '$pass'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

if($amount == 1){
    $user= mysqli_fetch_assoc($result);
    $_SESSION['user']= $user['user'];
    $_SESSION['cod_usuario']= $user['cod_usuario'];
    header("Location: ../pages/menu.html");
    exit();

}else{
    echo "Usuario o contraseña incorrectos.";
    echo "<br><a href= '../pages/login.html'>Volver</a>";
}



?>
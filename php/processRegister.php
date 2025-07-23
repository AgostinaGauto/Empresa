<?php
include("../php/connection.php");

$user= $_POST['user'];
$pass= $_POST['pass'];
$pass2= $_POST['pass2'];

if($pass2 == $pass){
    $sql= "INSERT INTO usuario(user, pass) VALUES('$user', '$pass')";
    $result= mysqli_query($connection, $sql);
    
    if($result){
        echo "Se ha registrado el usuario con exito.";
        echo "<br><a href= '../pages/login.html'>Volver</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../pages/registerUser.html'>Volver</a>";
    }

}else{
    echo "Las contraseñas ingresadas no coinciden. Vuelva a intentarlo.";
    echo "<br><a href= '../pages/registerUser.html'>volver</a>";
}

?>
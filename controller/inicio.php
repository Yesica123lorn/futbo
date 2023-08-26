<?php
require_once ('../base/conexion.php');
$bd = new database();
$conexion =$bd->conectar();
session_start();


if ($_POST["inicio"]) {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $cedula = $_POST["cedula"];


    $con =$conexion->prepare( "SELECT * FROM usuario WHERE usuario ='$usuario' AND contraseña ='$clave' AND documento='$cedula' ");
    $con->execute();
    $fila =$con->fetch();

    
    if($fila){
        // campo de la base de datos
        ///si el usuario la clace son correctas se can la sesion
        $_SESSION['documento'] = $fila['documento'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['tipo_use'] = $fila['id_tipo_use'];
        $_SESSION['usuario'] =$fila['usuario'];
       
        
        if($_SESSION['tipo_use'] ==1){
            header("location: ../vist/administrador/menu.php");
            exit();
        }
        
    }
    else{
        header("location: ../error.html");
        exit();
    }
}
?>
    
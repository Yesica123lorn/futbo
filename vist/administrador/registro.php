<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion =$base->conectar();
?>

<?php
if ((isset($_POST["equipo"]))&&($_POST["equipo"]=="formulario"))
{
    $nombre_equipo= $_POST['nombre_equipo'];
    $departamento= $_POST['departamento'];
//insertar una imagen, el logo del equipo 

    $validar =$conexion->prepare("SELECT * FROM registro_equipo WHERE nombre_equipo='$nombre_equipo' or departamento='$departamento'");
    $validar->execute();
    $fila1=$validar->fetchAll(PDO::FETCH_ASSOC);

    if ($fila1) {
        echo '<script>alert ("DOCUMENTO O USUARIO EXISTEN //CAMBIELOS//");</scrip>';
        echo '<script>window.location="registro.php"</script>';
    }
    else if ($nombre_equipo=="" || $departamento=="" )
    {
        echo '<script>alert ("FORMULARIO VACIO");</script>';
        echo '<script>window.location="registro.php"</script>';
    }

    else
    {
        $insert= $conexion->prepare ("INSERT INTO registro_equipo(nombre_equipo,departamento) VALUES ('$nombre_equipo','$departamento')");
        $insert -> execute();
        echo '<script>alert (" Registro Exitoso, Gracias");</script>';
        echo '<script>window.location="menu.php"</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../controller/css/registro.css"/>
</head>
<body class="" style="background-color:#9F6060";>
  <div class="container  #632a2a">
    <div class="row justify-content-center">
      <div class="custom-box col-md-9 ">
        <form class="form" method="POST">

    <div class="container-sm5"></div>
    <h1>Registro Equipo</h1>
        <br>
        <label for="nombre">Nombre Equipo</label>
        <input type="text" name="nombre_equipo" id="nombre_equipo" placeholder="Digite nombre">
        <label for="equipo">departamento</label>
        <input type="text" name="departamento" id="departamento" placeholder="Digite equipo">
        <input type="submit" class="btn btn-light" name="validar" value="Registrarme">
        <input type="hidden" name="equipo" value="formulario">
        <br>
        <a href="menu.php">volver</a>
        </form>
        

    </div>

</body>
</html>

<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion =$base->conectar();
?>

<?php
if ((isset($_POST["jugador"]))&&($_POST["jugador"]=="formulario"))
{

    $nombre= $_POST['nombre'];
    $equipo= $_POST['equipo'];
    $posicion= $_POST['posicion'];
  
//insertar una imagen, el logo del equipo 

    $validar =$conexion->prepare("SELECT * FROM jugador WHERE nombre='$nombre' or equipo='$equipo' or posicion='$posicion'");
    $validar->execute();
    $fila1=$validar->fetchAll(PDO::FETCH_ASSOC);

    if ($fila1) {
        echo '<script>alert ("DOCUMENTO O USUARIO EXISTEN //CAMBIELOS//");</scrip>';
        echo '<script>window.location="registro.php"</script>';
    }
    else if ($nombre=="" || $equipo=="" || $posicion=="" )
    {
        echo '<script>alert ("FORMULARIO VACIO");</script>';
        echo '<script>window.location="jugador.php"</script>';
    }

    else
    {
        $insert= $conexion->prepare ("INSERT INTO jugador(nombre,equipo,posicion) VALUES ('$nombre','$equipo','$posicion')");
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
      <div class="custom-box col-md-9">
        <form class="form" method="POST">

    <div class="container-sm7"></div>
    <h1>Registro jugador</h1>
        <br>
        <label for="nombre">Nombre </label>
        <input type="text" name="nombre" id="nombre" placeholder="Digite nombre">
      
        <select name="equipo" id="equipo">
            <option value="millonarios">millonarios</option>
            <option value="bucaramanga">Bucaramanga</option>
            <option value="chico">chico</option>
            <option value="tolima">tolima</option>
            <option value="quindio">quindio</option>

        </select>
        <br>
        <label for="posicion">posicion</label>
        <input type="text" name="posicion" id="posicion" placeholder="Digite posicion">
        <input type="submit" class="btn btn-light" name="validar" value="Registrarme">
        <input type="hidden" name="jugador" value="formulario">
        <br>
        <a href="menu.php">volver</a>
        </form>
        

    </div>

</body>
</html>
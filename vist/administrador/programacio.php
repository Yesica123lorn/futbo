<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion =$base->conectar();
?>

<?php
if ((isset($_POST["proramacio"]))&&($_POST["proramacio"]=="formulario"))
{

    $equipo= $_POST['equipo'];
    $equipos= $_POST['equipos'];
 
//insertar una imagen, el logo del equipo 

    $validar =$conexion->prepare("SELECT * FROM programacion WHERE equipo='$equipo' or equipos='$equipos' ");
    $validar->execute();
    $fila1=$validar->fetchAll(PDO::FETCH_ASSOC);

    if ($fila1) {
        echo '<script>alert ("ya existe informacion //CAMBIELOS//");</scrip>';
        echo '<script>window.location="programacio.php"</script>';
    }
    else if ($equipo=="" || $equipos==""  )
    {
        echo '<script>alert ("FORMULARIO VACIO");</script>';
        echo '<script>window.location="programacio.php"</script>';
    }

    else
    {
        $insert= $conexion->prepare ("INSERT INTO programacion(equipo,equipos) VALUES ('$equipo','$equipos')");
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
    <h1>Registro </h1>
    <br>
        
        <select name="equipo" id="equipo">
            <option value="millonarios">millonarios</option>
            <option value="bucaramanga">Bucaramanga</option>
            <option value="chico">chico</option>
            <option value="tolima">tolima</option>
            <option value="quindio">quindio</option>

        </select>
        <br>
        <br>
        <select name="equipos" id="equipos">
            <option value="millonarios">millonarios</option>
            <option value="bucaramanga">Bucaramanga</option>
            <option value="chico">chico</option>
            <option value="tolima">tolima</option>
            <option value="quindio">quindio</option>
        </select>
        <br>
        <label for="fecha">fecha </label>
        <input type="date" name="fecha" id="fecha" placeholder="Digite fecha">
      
        <input type="submit" class="btn btn-light" name="validar" value="Registrarme">
        <input type="hidden" name="proramacio" value="formulario">
        <br>
        <a href="menu.php">volver</a>
        </form>
        

    </div>

</body>
</html>
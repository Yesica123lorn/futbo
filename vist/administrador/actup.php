<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion =$base->conectar();

if(isset($_GET['button'])) {
    $nombre_equipo = $_GET['button'];

    // Obtener los detalles del equipo de la base de datos
    $consulta_equipo = $conexion->prepare("SELECT * FROM programacion WHERE equipo = :equipo");
    $consulta_equipo->bindParam(':equipo', $equipo);
    $consulta_equipo->execute();
    $equipo = $consulta_equipo->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_equipo = $_POST['id_equipo'];
    $equipos = $_POST['equipos'];
    $fecha = $_POST['fecha'];
  

    // Actualizar los detalles del equipo en la base de datos
    $actualizar_equipo = $conexion->prepare("UPDATE programacion SET equipo = :nuevo_equipo, departamento = :nuevo_equipos, fecha = :nuevo_fecha WHERE id = :id_equipo");
    $actualizar_equipo->bindParam(':nuevo_equipo', $nuevo_equipo);
    $actualizar_equipo->bindParam(':nuevo_equipos', $nuevo_equipos);
    $actualizar_equipo->bindParam(':nuevo_fecha', $nuevo_fecha);
    $actualizar_equipo->bindParam(':id_equipo', $id_equipo);
    
    if ($actualizar_equipo->execute()) {
        echo "SE ACTULIZARON DATOS.";
    } else {
        echo "ERROR EN  ACTUALIZAR.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../controller/css/registro.css">

</head>
<body class="" style="background-color:#9F6060";>
<div class="container  #632a2a">
    <div class="row justify-content-center">
       <div class="custom-box col-md-7">
       <h1>Actualizar Equipo</h1><br>

        <form method="POST" action="">
    <div class="container-sm3"></div>
        <input type="hidden" name="id_equipo" value="<?= $equipo['id'] ?>">
        <label for="equipo">equipo:</label>
        <input type="text" id="equipo" name="equipo" value="<?= $equipo['equipo'] ?>"><br>
        <label for="equipos">equipos:</label>
        <input type="text" id="equipos" name="equipos" value="<?= $equipo['equipos'] ?>"><br>
        <label for="equipos">fecha:</label>
        <input type="datetime" id="fecha" name="fecha" value="<?= $equipo['fecha'] ?>"><br>
        <button type="submit">Guardar Cambios</button>
        <a href="tabla.php">volver</a>
    </form>
</div>
</body>
</html>
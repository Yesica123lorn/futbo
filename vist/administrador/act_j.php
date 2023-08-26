<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion = $base->conectar();

if (isset($_GET['button'])) {
    $nombre = $_GET['button'];

    // Obtener los detalles del jugador de la base de datos
    $consulta_jugador = $conexion->prepare("SELECT * FROM jugador WHERE nombre = :nombre");
    $consulta_jugador->bindParam(':nombre', $nombre);
    $consulta_jugador->execute();
    $jugador = $consulta_jugador->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jugador = $_POST['id_jugador'];
    $nuevo_nombre = $_POST['nombre'];
    $nuevo_equipo = $_POST['equipo'];
    $nuevo_goles = $_POST['goles'];

    // Actualizar los detalles del jugador en la base de datos
    $actualizar_jugador = $conexion->prepare("UPDATE jugador SET nombre = :nuevo_nombre, equipo = :nuevo_equipo, goles = :nuevo_goles WHERE id = :id_jugador");
    $actualizar_jugador->bindParam(':nuevo_nombre', $nuevo_nombre);
    $actualizar_jugador->bindParam(':nuevo_equipo', $nuevo_equipo);
    $actualizar_jugador->bindParam(':nuevo_goles', $nuevo_goles);
    $actualizar_jugador->bindParam(':id_jugador', $id_jugador);
    
    if ($actualizar_jugador->execute()) {
        echo "Jugador actualizado correctamente.";
    } else {
        echo "Error al actualizar el jugador.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../controller/css/registro.css">
    
</head>
<body class="" style="background-color:#9F6060";>
<div class="container  #632a2a">
    <div class="row justify-content-center">
        <div class="custom-box col-md-7">
        <h1>Actualizar Jugador</h1><br>

        <form method="POST" action="">
    <div class="container-sm3"></div>
            <input type="hidden" name="id_jugador" value="<?= $jugador['id'] ?>">
            <label for="nombre">Nombre del jugador:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $jugador['nombre'] ?>"><br>
            <label for="equipo">Equipo:</label>
            <input type="text" id="equipo" name="equipo" value="<?= $jugador['equipo'] ?>"><br>
            <label for="goles">Goles:</label>
            <input type="number" id="goles" name="goles" value="<?= $jugador['goles'] ?>"><br>
            <button type="submit">Guardar Cambios</button>
            <a href="tablados.php">volver</a>
        </form>
</div>
</body>
</html>





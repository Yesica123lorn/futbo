<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion = $base->conectar();

if (isset($_GET['button'])) {
    $nombre = $_GET['button'];

    // Eliminar el jugador de la base de datos
    $eliminar_programacion = $conexion->prepare("DELETE FROM programacion WHERE equipo = :equipo");
    $eliminar_programacion->bindParam(':equipo', $equipo);

    if ($eliminar_programacion->execute()) {
        echo "programacion eliminada correctamente.";
    } else {
        echo "Error al eliminar la programacion.";
    }
}
?>
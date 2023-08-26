<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion = $base->conectar();

if (isset($_GET['button'])) {
    $nombre = $_GET['button'];

    // Eliminar el jugador de la base de datos
    $eliminar_jugador = $conexion->prepare("DELETE FROM jugador WHERE nombre = :nombre");
    $eliminar_jugador->bindParam(':nombre', $nombre);

    if ($eliminar_jugador->execute()) {
        echo "Jugador eliminado correctamente.";
    } else {
        echo "Error al eliminar el jugador.";
    }
}
?>
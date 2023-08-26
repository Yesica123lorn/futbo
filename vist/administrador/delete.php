<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion = $base->conectar();

if (isset($_GET['button'])) {
    $nombre_equipo = $_GET['button'];

    // Eliminar el registro de la base de datos
    $eliminar_equipo = $conexion->prepare("DELETE FROM registro_equipo WHERE nombre_equipo = :nombre");
    $eliminar_equipo->bindParam(':nombre', $nombre_equipo);

    if ($eliminar_equipo->execute()) {
        echo "Equipo eliminado correctamente.";
    } else {
        echo "Error al eliminar el equipo.";
    }
}
?>

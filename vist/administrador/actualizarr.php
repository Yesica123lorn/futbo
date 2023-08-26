<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion =$base->conectar();

if(isset($_GET['button'])) {
    $nombre_equipo = $_GET['button'];

    // Obtener los detalles del equipo de la base de datos
    $consulta_equipo = $conexion->prepare("SELECT * FROM registro_equipo WHERE nombre_equipo = :nombre");
    $consulta_equipo->bindParam(':nombre', $nombre_equipo);
    $consulta_equipo->execute();
    $equipo = $consulta_equipo->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_equipo = $_POST['id_equipo'];
    $nuevo_nombre = $_POST['nombre_equipo'];
    $nuevo_departamento = $_POST['departamento'];

    // Actualizar los detalles del equipo en la base de datos
    $actualizar_equipo = $conexion->prepare("UPDATE registro_equipo SET nombre_equipo = :nuevo_nombre, departamento = :nuevo_departamento WHERE id = :id_equipo");
    $actualizar_equipo->bindParam(':nuevo_nombre', $nuevo_nombre);
    $actualizar_equipo->bindParam(':nuevo_departamento', $nuevo_departamento);
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
        <label for="nombre_equipo">Nombre del equipo:</label>
        <input type="text" id="nombre_equipo" name="nombre_equipo" value="<?= $equipo['nombre_equipo'] ?>"><br>
        <label for="departamento">Departamento:</label>
        <input type="text" id="departamento" name="departamento" value="<?= $equipo['departamento'] ?>"><br>
        <button type="submit">Guardar Cambios</button>
        <a href="tabla.php">volver</a>
    </form>
</div>
</body>
</html>






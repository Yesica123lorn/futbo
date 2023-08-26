<?php
session_start();
require_once ('../../base/conexion.php');

$base = new database();
$conexion =$base->conectar();

$sql = $conexion ->prepare("SELECT * FROM usuario, tipo_use WHERE usuario = '".$_SESSION['usuario']."' AND usuario.id_tipo_use = tipo_use.id_tipo_use");
$sql -> execute();
$usua = $sql -> fetch();
?>


       
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../controller/css/estilo.css">
    
    <h1 id="h1" style="color: #ffff;">Menu Principal</h1>
</head>
<body class="" style="background-color: #e9e0e0;">
<div>
        <form method="POST">
            
        </form>
            <h2 style="color: #ffff;"  class="administrador">Bienvenido <?php echo $usua['id_use']?> <?php echo $usua['nombre']?></h2>
    </div>

<nav class="navbar navbar-expand-lg class="" style="background-color: #D84242;">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item background-color:#C5657C">

        <li class="nav-item a:hover background-color:#C5657C">
          <a class="nav-link active" aria-current="page" href="tablaprograma.php">Programacion De Partido</a>
        </li>
          <a class="nav-link active" aria-current="page" href="tabla.php">Tabla Equipos</a>
        </li>
        <li class="nav-item a:hover background-color:#C5657C">
          <a class="nav-link active" aria-current="page" href="tablados.php">Tabla De Jugadores</a>
        </li>
        <li class="nav-item a:hover background-color:#C5657C">
          <a class="nav-link active" aria-current="page" href="programacio.php">Registro De Programacion</a>
        </li>

        <li class="nav-item a:hover background-color:#C5657C">
          <a class="nav-link active" aria-current="page" href="jugador.php">Registro De Jugador</a>
        </li>
        <li class="nav-item a:hoverbackground-color:#C5657C">
          <a class="nav-link active" aria-current="page" href="registro.php">Registro De equipo</a>
        </li>
      </ul>
      <div>
        <button type="button"  class="btn btn-light" name="cerrar_cesion"> cerrar cesion</button>
      </div>
    </div>
  </div>
</nav>
<div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>
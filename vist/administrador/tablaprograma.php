<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion =$base->conectar();
?>

<?php
    $asig=$conexion->prepare("SELECT * FROM programacion ");
    $asig->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla</title>
    <link rel="stylesheet" href="../../controller/css/lista.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 
</head>
<body>
<h1>Lista De Equipos</h1><br>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>equipo </th>
                <th>equipos</th>
                <th>fecha</th>
                <th colspan="2">accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($asig as $asig){

            ?>

            <tr>
                <td><?= $asig['id']?></td>
                <td><?= $asig['equipo']?><td> VS <?= $asig['equipos']?></td>
                <td><?= $asig['fecha']?><td>
                
               
                <td class="">

                    <form method="GET" action="actup.php">
                        <input type="hidden" name="button" class="btn btn-light" value="<?= $asig['equipo']?>">
                        <button type="submit" class="btn btn-outline-light">ACTUALIZAR</button>
                    </form>
                
                </td>


                <td class="">

                    <form method="GET" action="elip.php">
                        <input type="hidden" name="button" class="btn btn-light"value="<?= $asig['equipo']?>">
                        <button type="submit" class="btn btn-outline-light">ELIMINAR</button>
                    
                    </form>
                    
                </td> 
        </thead>
        </tbody>
       
        <?php
                }
        ?>
    </table>
    <a href="menu.php">volver</a>
</body>
</html>
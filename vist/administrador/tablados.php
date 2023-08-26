<?php
require_once("../../base/conexion.php");
$base = new database();
$conexion =$base->conectar();
?>

<?php
    $asig=$conexion->prepare("SELECT * FROM jugador ");
    $asig->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../controller/css/lista.css">
 
</head>
<body>
<h1>Lista De Jugador</h1><br>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>equipo</th>
                <th>posicion</th>
                <th colspan="2">accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($asig as $asig){

            ?>

            <tr>
                <td><?= $asig['id']?></td>
                <td><?= $asig['nombre']?></td>
                <td><?= $asig['equipo']?></td>
                <td><?= $asig['posicion']?></td>
               
                <td class="">

                    <form method="GET" action="act_j.php">
                        <input type="hidden" name="button" class="btn btn-light" value="<?= $asig['nombre']?>">
                        <button type="submit" class="btn btn-outline-light">ACTUALIZAR</button>
                    </form>
                </td>
                


                <td class="">

                    <form method="GET" action="elimi.php">
                        <input type="hidden" name="button" class="btn btn-light" value="<?= $asig['nombre']?>">
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



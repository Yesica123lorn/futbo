<?php
    session_start();
    require_once("../../base/connection.php");
    include("../../controller/validarsesion.php");
    $sql ="SELECT * FROM user, tipo_user WHERE user.id_user='".$_SESSION['usuario']."' AND user.id_tip_user = tipo_user.id_tip_user";
    $usuario = mysqli_query($mysqli, $sql);
    $usua = mysqli_fetch_assoc($usuario);

?>


<?php
    $asig="SELECT * FROM user INNER JOIN tipo_user ON id_user.id_tip_user=tipo_user.id_tip_user";
    $asignacion=mysqli_query($mysqli, $asig);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../controller/css/lista_us.css">
    <title>Document</title>
</head>
<body> 
    <h1> lista tipo usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>document</th>
                <th>name</th>
                <th>user</th>
                <th>tipo_user</th>
                <th colspan="2">accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($asignacion as $asig){

            ?>

            <tr>
                <td><?= $asig['document']?></td>
                <td><?=  $asig['name']?></td>
                <td><?= $asig['user']?></td>
                <td><?= $asig['id_user']?></td>

                <td class="">

                    <form method="GET" action="actualizar.php">
                        <input type="hidden" name="button" value="<?= $asig['document']?>">
                        <button type="submit">actualizar</button>
                    </form>
                </td>
                </td>


                <td class="">

                    <form method="GET" action="actu_user.php">
                        <input type="hidden" name="button" value="<?= $asig['document']?>">
                        <button type="submit">ELIMINAR</button>
                    
                    </form>
                </td> 
            
            
            </tr>
        </tbody> 

        <?php
        }

        ?>


    </table>
    <a href="tablatipulis.php">volver</a>
</body>
</html>
<?php
session_start();

include("config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/personalizada.css">
    <title>Inicio</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php"></a> </p>
        </div>

        <div class="right-links">

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }

            /* echo "<a href='edit.php?Id=$res_id'>Change Profile</a>"; */
            ?>

            <a href="php/logout.php"> <button class="btn">Cerrar sesion</button> </a>

        </div>
    </div>
    <main>

        <div class="main-box top">
        <div class="top">
                <p style="display: flex;justify-content: space-between;align-items: center;font-size:50px;">Historial de invitados </p> <a href="../home.php"> <button class="btn">Regresar</button> </a>
            </div>
            <br>
            <div class="bottom">
                <div class="box">
                <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Asistencia</th>
                <th>Ninos</th>
                <th>Adolescentes</th>
                <th>Adultos</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody style="height: 500px;overflow-y: scroll;">

        <?php
        
        
        $query = mysqli_query($con, "SELECT * FROM historial");

            while ($result = mysqli_fetch_assoc($query)) {
                $id = $result['id'];
                $nombre = $result['nombre'];
                $telefono = $result['numero'];
                $asistencia = $result['confirm'];
                $ninos = $result['nino'];
                $adolecentes = $result['adolecente'];
                $adultos = $result['adultos'];
                $fecha = $result['fecha'];
                      
                ?>
            <tr>

                    <td style="text-align: center;"><?php echo $id ?></td>
                    <td style="text-align: center;"><?php echo $nombre ?></td>
                    <td style="text-align: center;"><?php echo $telefono ?></td>
                    <td style="text-align: center;"><?php echo $asistencia ?></td>
                    <td style="text-align: center;"><?php echo $ninos ?></td>
                    <td style="text-align: center;"><?php echo $adolecentes ?></td>
                    <td style="text-align: center;"><?php echo $adultos ?></td>
                    <td style="text-align: center;"><?php echo $fecha ?></td>



            </tr>

            <?php

            }
        
        
        
        ?>
                
            
        </tbody>
    </table>
                </div>
            </div>
            
        </div>


        
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>

</html>
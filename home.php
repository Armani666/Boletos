<?php
session_start();

include("php/config.php");
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
    <link rel="stylesheet" href="style/style.css">
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
                <div class="box">
                    <p>Hola <b><?php echo $res_Uname ?></b></p>
                </div>
                <div class="box">
                    <p>Tu correo es <b><?php echo $res_Email ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p style="display: flex;justify-content: space-between;align-items: center;">Realizar Invitacion <a href="php/invitacion.php"> <button class="btn">ir</button> </a></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p style="display: flex;justify-content: space-between;align-items: center;">Historial de invitados <a href="php/historial.php"> <button class="btn">ir</button> </a></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p style="display: flex;justify-content: space-between;align-items: center;">Editar numero Invitados <a href="php/invitados.php"> <button class="btn">ir</button> </a></p>
                </div>
            </div>
        </div>

    </main>
</body>

</html>
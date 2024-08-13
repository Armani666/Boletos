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
    <title>Inicio</title>


   <!--  <script>
        function calcula(campo) {
            var ingresado = document.getElementById('adulto').value;

            var opera = campo - ingresado;

            ingre

        }
    </script>    -->

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

            $queryInvitados = mysqli_query($con, "SELECT * FROM invitados ");
            while ($resultCant = mysqli_fetch_assoc($queryInvitados)) {
                $cantidadAdulto = $resultCant['tmp_adultos'];
                $cantidadAdolecente = $resultCant['tmp_adolecente'];
                $cantidadNino = $resultCant['tmp_ninos'];
            }

            /* echo "<a href='edit.php?Id=$res_id'>Change Profile</a>"; */
            ?>

            <a href="php/logout.php"> <button class="btn">Cerrar sesion</button> </a>

        </div>
    </div>
    <main>

        <div class="main-box top">
            <div class="top">
                <p style="display: flex;justify-content: space-between;align-items: center;font-size:50px;">Envio De Invitacion </p> <a href="../home.php"> <button class="btn">Regresar</button> </a>
            </div>
            <br>
            <div class="bottom">
                <form action="procesa.php" method="post">
                <div class="box">
                    <p style="display: flex;justify-content: space-between;align-items: center;">Cantidad de invitados</p> <br>

                    <p style="display: flex;justify-content: space-between;align-items: center;">Adultos</p>
                    <div style="display: flex;justify-content: space-between;">

                        <input type="number" style="width: 80%;" max="<?php echo $cantidadAdulto ?>" id="adulto" name="adulto" require>

                        <h6> Catidad disponible: <?php echo $cantidadAdulto ?></h6>
                    </div>
                    <p style="display: flex;justify-content: space-between;align-items: center;">Adolecentes</p>
                    <div style="display: flex;justify-content: space-between;">

                        <input type="number" style="width: 80%;" max="<?php echo $cantidadAdolecente ?>" id="adolecente" name="adolecente" require>

                        <h6> Catidad disponible: <?php echo $cantidadAdolecente ?></h6>
                    </div>
                    <p style="display: flex;justify-content: space-between;align-items: center;">Ninos</p>
                    <div style="display: flex;justify-content: space-between;">

                        <input type="number" style="width: 80%;" max="<?php echo $cantidadNino ?>" id="nino" name="nino" require>

                        <h6> Catidad disponible: <?php echo $cantidadNino ?></h6>
                    </div>
                </div>

                <br>

                <div class="box">
                    <p style="display: flex;justify-content: space-between;align-items: center;">Nombre</p> 

                    <input type="text" id="nombre" name="nombre" require>
<br>

                    <p style="display: flex;justify-content: space-between;align-items: center;">Numero Telefonico</p> 

                    <input type="text" id="whats" name="whats" require>
                </div>

                <br>

                <div class="box">
                    <p style="display: flex;justify-content: space-between;align-items: center;">Texto a Mandar</p> <br>
                    <textarea name="texto" id="texto" cols="30" rows="10">Como no recordar que hace 15 años nació la flor más hermosa de este hogar, por eso te queremos invitar a su celebración, con mucha alegría y dando gracias a Dios por regalarme tan hermosa bendición.</textarea>
                </div>
            </div>
            <br>
            <div style="width: 100%;">
                <a href="php/historial.php"> <button class="btn" style="width: 100%;">Enviar</button> </a>
            </div>
            </form>

           

            <br>
            <br>
            <br>
            <br>
            <br>

        </div>

    </main>
</body>

</html>
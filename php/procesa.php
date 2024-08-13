<?php
session_start();

include("config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}


$adulto = $_POST["adulto"];
$adole = $_POST["adolecente"];
$nino = $_POST["nino"];
$nombre = $_POST["nombre"];
$whats = '+52' . $_POST["whats"];
$texto = $_POST["texto"];

$nombresss = $_POST["nombre"];

$queryUlt = mysqli_query($con, "select id from historial ORDER BY `historial`.`id` DESC");
$queryUlt = mysqli_fetch_array($queryUlt);

$queryUlt = md5($queryUlt[0] + 1);






$confirm = '%0A https://arianezfiestaxv.com/confirm.php?id='.$queryUlt;

$nombre = 'Hola '. $nombre . '%0A%0A';

$queryHistorial = mysqli_query($con, "INSERT INTO historial (nombre, adultos, adolecente, nino, numero, fecha) VALUES ('". $nombresss ."','".$adulto ."','".$adole ."','".$nino ."','".$whats."', '". date("Y-m-d") ."');");


/* echo "INSERT INTO historial (nombre, adultos, adolecente, nino, numero) VALUES ('". $nombresss ."','".$adulto ."','".$adole ."','".$nino ."','".$whats."', '". date("Y-m-d") ."');"; */

/* if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} */



$queryInvitados = mysqli_query($con, "SELECT * FROM invitados ");
while ($resultCant = mysqli_fetch_assoc($queryInvitados)) {
    $cantidadAdulto = $resultCant['tmp_adultos'];
    $cantidadAdolecente = $resultCant['tmp_adolecente'];
    $cantidadNino = $resultCant['tmp_ninos'];
}


$urlencodedtext = str_replace(' ', '%20', $texto);

$conca = "%0A%0A";

if ($adulto) {
    $conca .= 'Adultos:%20' . $adulto . "%0A";
}
if ($adole) {
    $conca .= 'Adolecentes:%20' . $adole . "%0A";
}
if ($nino) {
    $conca .= 'Nino:%20' . $nino . "%0A";
}
$condicion = "";
$condicion .= 'tmp_adultos =' . ($cantidadAdulto - $adulto) .',';
$condicion .= 'tmp_adolecente =' . ($cantidadAdolecente - $adole) .',';
$condicion .= 'tmp_ninos =' . ($cantidadNino - $nino);


$queryCantidad = mysqli_query($con, "UPDATE invitados SET $condicion ");




?>


<script type="text/javascript">
    window.open('https://api.whatsapp.com/send?phone=<?php echo $whats ?>&text=<?php echo $nombre . $urlencodedtext . $conca . $confirm ?>', '_blank');

    /* window.history.go(-1); */
    /*  window.history.back(); */
    location.href = "invitacion.php";
</script>
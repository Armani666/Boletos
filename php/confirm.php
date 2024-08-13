<?php


echo $_POST["id"]; 
echo "<br>";


$adulto = $_POST["adulto"]; 
$adole = $_POST["adolecente"]; 
$nino = $_POST["nino"]; 
$nombre = $_POST["nombre"]; 
$whats = '+52' .$_POST["whats"]; 
$texto = $_POST["texto"]; 

$urlencodedtext = str_replace(' ','%20',$texto);

$conca = "%0A%0A";

if ($adulto) {
    $conca .= 'Adultos:%20'.$adulto . "%0A"; 
}
if ($adole) {
    $conca .= 'Adolecentes:%20'.$adole . "%0A"; 
}
if ($nino) {
    $conca .= 'Nino:%20'.$nino . "%0A"; 
}



?>


<script type="text/javascript">
       window.open('https://api.whatsapp.com/send?phone=<?php echo $whats?>&text=<?php echo $urlencodedtext . $conca?>', '_blank');
    </script>

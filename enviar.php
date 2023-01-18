<?php

$nombres =$_POST['nombres'];
$apellido =$_POST['apellido'];
$correo =$_POST['correo'];
$celular =$_POST['celular'];
$mensaje =$_POST['mensaje'];

if ($nombres == '' || $apellido == '' || $correo == '' || $celular == '' || $mensaje == '') {


    header("Location: formulariocontacto.php?estado=1");
    
    exit;
}else{


$para = "losk.tutos@gmail.com";
$asunto = "solicitud de contacto";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$message = "
<html>
<head>
<title>CONTACTO</title>
</head>
<body>
<h1>Tus datos Son:</h1>
<p></p>
<p>Nombre Completo: " . $nombres . " ". $apellido . "</p>
<p>Email: " . $correo . "</p>
<p>Celular: " . $celular . "</p>
<p>Mensaje: " . $mensaje . "</p>
</body>
</html>";

mail($para, $asunto, $message, $headers);
header("Location: formulariocontacto.php?estado=2");
exit;
}


?>
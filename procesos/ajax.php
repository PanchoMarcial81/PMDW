<?php
if (!isset($_POST)) {
	die('No autorizado');
}

// Funcion para trabajar nuestras respuetsas
function json_output($status = 200, $msg = 'OK', $data = []){
	echo json_encode(['status' => $status, 'msg' => $msg, 'data' => $data]);
	die();
}

if (empty($_POST['nombre'])) {
	json_output(400, 'Ingresa un nombre válido.');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	json_output(400, 'Ingresa un email válido.');
}

if (empty($_POST['tel'])) {
	json_output(400, 'Ingresa un telefono válido.');
}

if (empty($_POST['mensaje']) || strlen($_POST['mensaje']) < 5) {
	json_output(400, 'Ingresa un mensaje válido.');
}

// Informacion del formulario
$info['nombre'] = $_POST['nombre'];
$info['email'] = $_POST['email'];
$info['tel'] = $_POST['tel'];
$info['mensaje'] = $_POST['mensaje'];
$info['ip'] = $_SERVER['REMOTE_ADDR'];
$info['fecha'] = date('d M Y H:m:s');

// Remitente y destinatario
$para = 'contacto@panchomarcial.cl';

// Debe ser un email del servidor local
$de = $info['email'];

// Asusnto del mensaje
$asunto = 'Nuevo mensaje - PanchoMarcial.cl';

// Cabecera que aparecen en la parte superior
$headers = "From: {$de}\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";

// Mensaje de correo
$mensaje = " 
<html>
<body>
<h3>Mensaje para PanchoMarcial.cl</h3> 
<p><strong>Nombre: </strong> {$info['nombre']}</p>
<p><strong>E-mail: </strong> {$info['email']}</p>
<p><strong>Teléfono: </strong> {$info['tel']}</p>
<p><strong>Mensaje: </strong> {$info['mensaje']}</p>
<br>
<p><i>{$info['ip']}</i></p>
<p><i>{$info['fecha']}</i></p>
</body>
</html>
";

// Valida si es o no
$enviar = mail($para, $asunto, $mensaje, $headers);
if (!$enviar) {
	json_output(400, 'Hubo un error al enviar el mensaje');
}else{
	json_output(200, 'Mensaje enviado con éxito', $mensaje);
}
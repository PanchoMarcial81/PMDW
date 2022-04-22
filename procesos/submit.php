<?php
if (isset($_POST['submit'])) {
	if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])) {
		/* Si no estan llenos los campos */
		header("Location: ../contacto.html?llena-todos-los-campos");
		exit();
	}else{
		$info['nombre'] = $_POST['nombre'];
		$info['email'] = $_POST['email'];
		if (empty($_POST['tel'])) {
			$info['telefono'] = 'No ingresó número de teléfono';
		}else{
			$info['telefono'] = $_POST['tel'];
		}
		$info['mensaje'] = $_POST['mensaje'];
		$info['ip'] = $_SERVER['REMOTE_ADDR'];
		$info['fecha'] = 

		/* Para probar localmente */
		$mensaje = "
		<html>
		<body>
			<h3>Tu mensaje ha sido enviado</h3>
			<p><strong>Nombre:</strong> $info['nombre']</p>
			<p><strong>E-mail:</strong> $info['email']</p>
			<p><strong>Teléfono:</strong> $info['telefono']</p>
			<p><strong>Mensaje:</strong> $info['mensaje']</p>
			<br>

		</body>
		</html>
		";

		/* Envio real de formulario */
		$para = "contacto@panchomarcial.cl";
		$de = $para;

		// Asunto del correo
		$asusnto = "Hola, es mi primer correo - >PanchoMarcial";

		// Cabecera que aparecen arriba de tu correo
		$headers = "From: $de\r\n";
		$headers .= "MIME-Version: 1.0 \r\n";
		$headers .= "Content-type: text/html; charset=utf8 \r\n";

		// Enviando el formulario
		$enviar = mail($para, $asusnto, $mensaje, $headers);
		if ($enviar) {
			// Si se envia el correo
			echo "Mensaje enviado";
		}else{
			echo "Uppssss!, No se envió el mensaje!!!";
			echo "<pre>";
			var_dump($enviar);
		}
	}
}else{
	header("Location: ../contacto.html?error");
	exit();
}

?>
<br>
<br>
<a href="../contacto.html">Regresar</a>

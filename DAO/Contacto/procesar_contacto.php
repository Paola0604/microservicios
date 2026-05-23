<?php
// procesar_contacto.php

require('../../Conexion/conexion.php');
// Recibir los datos del formulario
$nombre = $_POST['name'];
$correo = $_POST['email'];
$asunto = $_POST['subject'];
$mensaje = $_POST['message'];

// Preparar y ejecutar la consulta
$sql = "INSERT INTO contactos (nombre, correo, asunto, mensaje) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $correo, $asunto, $mensaje);

// Procesar el contacto
if ($stmt->execute()) {
    echo "¡Mensaje enviado correctamente!";
} else {
    echo "Error al enviar el mensaje.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

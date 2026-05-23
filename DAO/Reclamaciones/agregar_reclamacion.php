<?php
// Incluir el archivo de conexión
include '../../Conexion/conexion.php'; // Ajusta la ruta según sea necesario

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['reclamacion'];

// Preparar y bindear la sentencia
$stmt = $conn->prepare("INSERT INTO reclamaciones (nombre, correo, mensaje) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $mensaje);

// Ejecutar la sentencia
if ($stmt->execute()) {
    // Redirigir con mensaje de éxito
    header("Location: ../../reclamaciones.php?msg=success");
} else {
    // Redirigir con mensaje de error
    header("Location: ../../reclamaciones.php?msg=error");
}

// Cerrar la conexión
$stmt->close();
$conn->close();
exit; // Asegurarse de que no se ejecute más código después de la redirección
?>

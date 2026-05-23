<?php
header("Access-Control-Allow-Origin: *"); // Permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Methods: POST, OPTIONS"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Encabezados permitidos

// Parámetros de conexión
$servername = "localhost"; // Cambia si es necesario
$username = "root";         // Cambia por tu usuario de base de datos
$password = "";             // Cambia por tu contraseña de base de datos
$dbname = "bdsamuk";       // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibió el ID a eliminar
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Consulta para eliminar el contacto
    $query = "DELETE FROM contactos WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    // Comprobar si se eliminó el contacto
    echo $stmt->affected_rows > 0 ? "Contacto eliminado" : "Error al eliminar";
    
    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
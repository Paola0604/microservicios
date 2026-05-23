<?php
header("Access-Control-Allow-Origin: *"); // Permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Métodos permitidos
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

// Consulta para obtener los contactos
$query = "SELECT id, nombre, correo, asunto, mensaje FROM contactos";
$result = $conn->query($query);

$contactos = array();
while ($row = $result->fetch_assoc()) {
    $contactos[] = $row;
}

// Retornar los contactos en formato JSON
echo json_encode(array("data" => $contactos));

// Cerrar la conexión
$conn->close();
?>
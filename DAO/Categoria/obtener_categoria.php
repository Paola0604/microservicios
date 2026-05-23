<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
$servername = "localhost"; // Cambia si es necesario
$username = "root";         // Cambia por tu usuario de base de datos
$password = "";             // Cambia por tu contraseña de base de datos
$dbname = "bdsamuk";       // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM categorias WHERE id = $id";
$result = $conn->query($sql);
$categoria = $result->fetch_assoc();

echo json_encode($categoria);

$conn->close();
?>
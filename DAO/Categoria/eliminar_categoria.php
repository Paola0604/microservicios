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

$id = $_POST['id'];

$sql = "DELETE FROM categorias WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Categoría eliminada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
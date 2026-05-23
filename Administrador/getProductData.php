<?php
$servername = "localhost"; // Cambia si es necesario
$username = "root";    // Cambia por tu usuario de base de datos
$password = "";  // Cambia por tu contraseña de base de datos
$dbname = "bdsamuk";         // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM productos WHERE id='$id'");
    $product = $result->fetch_assoc();
    echo json_encode($product);
}

// Cerrar conexión
$conn->close();
?>

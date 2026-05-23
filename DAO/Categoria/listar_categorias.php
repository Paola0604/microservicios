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

// Preparar la consulta
$sql = "SELECT * FROM categorias";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['descripcion']}</td>
                <td>
                    <button class='btn btn-warning btn-editar' data-id='{$row['id']}'>Editar</button>
                    <button class='btn btn-danger btn-eliminar' data-id='{$row['id']}'>Eliminar</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4' class='text-center'>No hay categorías disponibles.</td></tr>";
}

// Cerrar la conexión
$conn->close();
?>
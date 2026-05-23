<?php
// Listar_Reclamaciones.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdsamuk";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener datos de la tabla filtrados por nombre o email si se envió un parámetro de búsqueda
$search_query = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
    $search = $conn->real_escape_string($_GET["search"]);
    $search_query = " WHERE nombre LIKE '%$search%' OR correo LIKE '%$search%'";
}

$sql = "SELECT ID, nombre, correo, mensaje FROM reclamaciones" . $search_query;
$result = $conn->query($sql);

// Generar filas de la tabla si hay resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["ID"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["correo"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["mensaje"]) . "</td>";
        echo "<td>
        <a href='mailto:" . htmlspecialchars($row["correo"]) . "?subject=Samuk SAC&body=Hola " . htmlspecialchars($row["nombre"]) . ",%0D%0A%0D%0A
Es un placer presentarte Samuk SAC, una empresa dedicada a ofrecer productos de calidad en el mercado, pensados para satisfacer las necesidades de nuestros clientes.%0D%0A
En Samuk SAC, nos enfocamos en brindar una experiencia de servicio excelente, y estamos comprometidos en ayudarte a encontrar soluciones eficaces y personalizadas.%0D%0A%0D%0A
Contacto%0D%0A
Si tienes alguna pregunta o requieres más información, no dudes en contactarnos:%0D%0A
Teléfono: 937397545%0D%0A
Correo Electrónico: contacto@samuksac.com%0D%0A%0D%0A
Saludos cordiales,' class='btn btn-primary btn-sm'>Enviar correo</a>
                <button type='button' class='btn btn-danger btn-sm btn-eliminar' data-id='" . htmlspecialchars($row["ID"]) . "'>
                    <i class='fas fa-trash-alt'></i> Eliminar
                </button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conn->close();
?>

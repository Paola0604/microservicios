<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Contactos</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="css/cssindex.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <?php include 'Components/headerAdmin.php'; ?>
    <div class="container mt-5">
    <h1 class="text-center" style="font-weight: 590; font-size: 2.2rem;">Gestión de Contactos</h1>
<br><br>
        <!-- Tabla para mostrar los contactos -->
        <table id="contactosTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Mensaje</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Parámetros de conexión
                $servername = "localhost";
                $username = "root"; 
                $password = ""; 
                $dbname = "bdsamuk"; 

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consulta para obtener los contactos
                $query = "SELECT id, nombre, correo, asunto, mensaje FROM contactos";
                $result = $conn->query($query);

                // Mostrar contactos en la tabla
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nombre']}</td>
                                <td>{$row['correo']}</td>
                                <td>{$row['asunto']}</td>
                                <td>{$row['mensaje']}</td>
                                <td>
                                    <a href='mailto:{$row['correo']}?subject=" . urlencode($row['asunto']) . "&body=" . urlencode($row['mensaje']) . "' target='_blank'>
                                        <button class='btn btn-secondary'><i class='fas fa-envelope'></i> Enviar Correo</button>
                                    </a>
                          
                                    <button class='btn btn-danger btn-eliminar' data-id='{$row['id']}'> <i class='fas fa-trash'></i> Eliminar</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No hay contactos disponibles</td></tr>";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
<script>

// Eliminar contacto
$(document).on('click', '.btn-eliminar', function() {
    let id = $(this).data('id');
    if (confirm('¿Estás seguro de que deseas eliminar este contacto?')) {
        $.ajax({
            url: 'http://localhost/Samuk/DAO/Contacto/eliminar_contacto.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                alert(response); // Mostrar mensaje de respuesta
                location.reload(); // Recargar la página
            }
        });
    }
});

</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
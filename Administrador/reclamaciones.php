<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamaciones recibidas</title>
    <!-- Agregar enlaces CSS necesarios -->
     <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Added jQuery -->
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/cssindex.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php include 'Components/headerAdmin.php'; ?>
    <main>
        <div class="container">
            <h1>Reclamaciones recibidas</h1>
              <!-- Mostrar mensajes de estado -->
              <?php
                if (isset($_GET['mensaje'])) {
                    if ($_GET['mensaje'] == 'eliminado') {
                        echo "<div class='alert alert-success'>Reclamación eliminada exitosamente.</div>";
                    } elseif ($_GET['mensaje'] == 'error') {
                        echo "<div class='alert alert-danger'>Error al eliminar la reclamación.</div>";
                    }
                }
            ?>
            <form method="GET" action=../DAO/Reclamaciones/Listar_Reclamaciones.php" class="mb-3">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Ingrese la búsqueda deseada">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th> <!-- Se agregó la columna de ID -->
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th>Acción</th>
                    </tr>
                </thead>
               <tbody>
                   <?php include '../DAO/Reclamaciones/Listar_Reclamaciones.php'; ?>
               </tbody>
            </table>
        </div>
    </main>
    <!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="eliminarConfirmacionModal" tabindex="-1" aria-labelledby="eliminarConfirmacionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarConfirmacionModalLabel">Confirmación de Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalMensaje">
                <!-- Mensaje de confirmación se mostrará aquí -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

    <!-- Scripts -->

<script>
$(document).ready(function() {
    // Función para manejar la eliminación
    $('.btn-eliminar').on('click', function() {
        var id = $(this).data('id');
        
        if (confirm('¿Estás seguro de que deseas eliminar esta reclamación?')) {
            $.ajax({
                url: '../DAO/Reclamaciones/eliminar_reclamacion.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    // Mostrar mensaje de éxito o error en el modal
                    if (response.status === 'success') {
                        // Eliminar la fila correspondiente de la tabla
                        $('button[data-id="' + id + '"]').closest('tr').remove();
                        
                        // Mostrar mensaje en el modal
                        $('#modalMensaje').text(response.message);
                        $('#eliminarConfirmacionModal').modal('show');

                        // Ocultar el modal automáticamente después de 2 segundos
                        setTimeout(function() {
                            $('#eliminarConfirmacionModal').modal('hide');
                        }, 2000);
                    } else {
                        // Mostrar mensaje de error
                        $('#modalMensaje').text(response.message);
                        $('#eliminarConfirmacionModal').modal('show');
                    }
                },
                error: function() {
                    // Mostrar mensaje de error genérico
                    $('#modalMensaje').text('Hubo un error al procesar la solicitud.');
                    $('#eliminarConfirmacionModal').modal('show');
                }
            });
        }
    });
});

</script>
</body>
</html>

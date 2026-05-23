
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías</title>
    
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
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Categorías</h1>
        
        <!-- Botón para agregar nueva categoría -->
        <div class="text-end mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarCategoria">
                <i class="fas fa-plus"></i> Agregar Categoría
            </button>
        </div>

        <!-- Tabla para mostrar las categorías -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaCategorias">
                <!-- Aquí se mostrarán las categorías -->
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar nueva categoría -->
    <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" aria-labelledby="modalAgregarCategoriaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formAgregarCategoria">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarCategoriaLabel">Agregar Categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para editar categoría -->
    <div class="modal fade" id="modalEditarCategoria" tabindex="-1" aria-labelledby="modalEditarCategoriaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditarCategoria">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarCategoriaLabel">Editar Categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editarId" name="id">
                        <div class="mb-3">
                            <label for="editarNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editarNombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarDescripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="editarDescripcion" name="descripcion" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para manejar el agregado de categorías -->
    <script>
        $(document).ready(function() {
            // Cargar categorías al cargar la página
            cargarCategorias();

            // Función para cargar categorías desde la base de datos
            function cargarCategorias() {
                $.ajax({
                    url: 'http://localhost/Samuk/DAO/Categoria/listar_categorias.php', // Archivo que lista las categorías
                    type: 'GET',
                    success: function(data) {
                        $('#tablaCategorias').html(data);
                    }
                });
            }

            // Agregar nueva categoría
            $('#formAgregarCategoria').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'http://localhost/Samuk/DAO/Categoria/agregar_categoria.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#modalAgregarCategoria').modal('hide');
                        cargarCategorias(); // Recargar categorías
                    }
                });
            });

            // Editar categoría (abrir modal con datos cargados)
            $(document).on('click', '.btn-editar', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: 'http://localhost/Samuk/DAO/Categoria/obtener_categoria.php', // Obtiene los datos de la categoría por ID
                    type: 'GET',
                    data: { id: id },
                    success: function(data) {
                        let categoria = JSON.parse(data);
                        $('#editarId').val(categoria.id);
                        $('#editarNombre').val(categoria.nombre);
                        $('#editarDescripcion').val(categoria.descripcion);
                        $('#modalEditarCategoria').modal('show');
                    }
                });
            });

            // Guardar cambios de la edición
            $('#formEditarCategoria').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'http://localhost/Samuk/DAO/Categoria/editar_categoria.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#modalEditarCategoria').modal('hide');
                        cargarCategorias(); // Recargar categorías
                    }
                });
            });

            // Eliminar categoría
            $(document).on('click', '.btn-eliminar', function() {
                let id = $(this).data('id');
                if (confirm('¿Estás seguro de que deseas eliminar esta categoría?')) {
                    $.ajax({
                        url: 'http://localhost/Samuk/DAO/Categoria/eliminar_categoria.php',
                        type: 'POST',
                        data: { id: id },
                        success: function(response) {
                            cargarCategorias(); // Recargar categorías
                        }
                    });
                }
            });
        });
         
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

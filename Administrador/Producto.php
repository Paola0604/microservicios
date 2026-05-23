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

// Manejo de la solicitud de agregar un producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item'])) {
    // Obtener datos del formulario
    $item = $_POST['item'];
    $foto = $_FILES['foto']['name']; // Nombre del archivo
    $tamano = $_POST['tamano']; // Nombre del archivo;
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];

    // Mover el archivo subido a un directorio específico
    $uploadDir = "Ruta_Directorio/"; // Cambia esto a tu ruta deseada
    // Verificar si el directorio existe, si no, crear el directorio
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Crea el directorio con permisos 0755
    }

    // Mover el archivo
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . $foto)) {
        // Archivo movido exitosamente
    } else {
        echo "Error al mover el archivo.";
    }

    // Insertar en la base de datos
    $sql = "INSERT INTO productos (item, foto, tamano, descripcion, stock, precio) VALUES ('$item', '$foto', '$tamano', '$descripcion', '$stock', '$precio')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>$('#modalConfirmation').modal('show');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Manejo de la solicitud de editar un producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editProductId'])) {
    $editProductId = $_POST['editProductId'];
    $result = $conn->query("SELECT * FROM productos WHERE id='$editProductId'");
    $product = $result->fetch_assoc();
}

// Manejo de la solicitud de actualizar el producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateItem'])) {
    $updateItem = $_POST['updateItem'];
    $foto = $_FILES['foto']['name']; // Nombre del archivo
    $updateTamano = $_POST['updateTamano'] ;
    $updateDescripcion = $_POST['updateDescripcion'];
    $updateStock = $_POST['updateStock'];
    $updatePrecio = $_POST['updatePrecio'];
    $updateId = $_POST['updateId'];

    // Mover el archivo subido si se ha cargado uno nuevo
    if ($updateFoto) {
        // Mover el archivo
        if (move_uploaded_file($_FILES['updateFoto']['tmp_name'], $uploadDir . $updateFoto)) {
            // Archivo movido exitosamente
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        // Mantener el nombre del archivo existente
        $updateFoto = $conn->query("SELECT foto FROM productos WHERE id='$updateId'")->fetch_assoc()['foto'];
    }

    // Actualizar en la base de datos
    $sql = "UPDATE productos SET item='$updateItem', foto='$updateFoto', tamano='$updateTamano', descripcion='$updateDescripcion', stock='$updateStock', precio='$updatePrecio' WHERE id='$updateId'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>$('#modalConfirmation').modal('show');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Manejo de la solicitud de eliminar un producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Eliminar de la base de datos
    $sql = "DELETE FROM productos WHERE id='$productId'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>$('#modalConfirmation').modal('show');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener todos los productos para mostrarlos en el formulario de eliminar y editar
$productos = $conn->query("SELECT * FROM productos");

// Realizar consulta para obtener todos los productos
$sql = "SELECT id, item, foto, tamano, descripcion, stock, precio FROM productos";
$result = $conn->query($sql);

// Cerrar conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestión de Productos</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JS -->

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="css/cssindex.css" rel="stylesheet" type="text/css"/>
        <link href="css/cssProducto.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <?php include 'Components/headerAdmin.php'; ?>
       
        <div class="container main-content">
        <h1 class="text-center" style="font-weight: 590; font-size: 2.2rem;">Gestión de Contactos</h1>

            <!-- Secciones del dashboard (buttons) -->
            <div class="container-fluid">
                <div class="row">
                    <!-- Button Group -->
                    <div class="col-md-12">
                        <div class="btn-group d-flex justify-content-center mb-4" role="group" aria-label="Button group">
                            <!-- Add Product Button -->
                            <button class="btn btn-success btn-action" id="btnAddProduct" data-bs-toggle="modal" data-bs-target="#modalAddProduct">
                                <i class="fas fa-plus-circle"></i> Agregar Producto
                            </button>

                            <!-- Edit Product Button -->
                            <button class="btn btn-primary btn-action" id="btnEditProduct" data-bs-toggle="modal" data-bs-target="#modalEditProduct">
                                <i class="fas fa-edit"></i> Editar Producto
                            </button>

                            <!-- Delete Product Button -->
                            <button class="btn btn-danger btn-action" id="btnDeleteProduct" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct">
                                <i class="fas fa-trash-alt"></i> Eliminar Producto
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Agregar Producto -->
            <div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="modalAddProductLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddProductLabel">Agregar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="productForm" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="item" class="form-label">Item</label>
                                    <input type="text" class="form-control" id="item" name="item" required>
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tamano" class="form-label">Tamaño</label>
                                    <input type="text" class="form-control" id="tamano" name="tamano" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" required>
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                                </div>
                                <button type="submit" class="btn btn-success">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Editar Producto -->
            <div class="modal fade" id="modalEditProduct" tabindex="-1" aria-labelledby="modalEditProductLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditProductLabel">Editar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="editProductForm" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="editProductId" class="form-label">ID del Producto a Editar</label>
                                    <select class="form-select" id="editProductId" name="editProductId" required onchange="fetchProductData(this.value)">
                                        <option value="" selected disabled>Seleccione un producto</option>
                                        <?php while ($row = $productos->fetch_assoc()): ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['item']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="updateItem" class="form-label">Item</label>
                                    <input type="text" class="form-control" id="updateItem" name="updateItem" required>
                                </div>
                                <div class="mb-3">
                                    <label for="updateFoto" class="form-label">Foto (opcional)</label>
                                    <input type="file" class="form-control" id="updateFoto" name="updateFoto">
                                </div>
                                <div class="mb-3">
                                    <label for="updateTamano" class="form-label">Tamaño</label>
                                    <input type="text" class="form-control" id="updateTamano" name="updateTamano" required>
                                </div>
                                <div class="mb-3">
                                    <label for="updateDescripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="updateDescripcion" name="updateDescripcion" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="updateStock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="updateStock" name="updateStock" required>
                                </div>
                                <div class="mb-3">
                                    <label for="updatePrecio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id="updatePrecio" name="updatePrecio" step="0.01" required>
                                </div>
                                <input type="hidden" id="updateId" name="updateId">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Eliminar Producto -->
            <div class="modal fade" id="modalDeleteProduct" tabindex="-1" aria-labelledby="modalDeleteProductLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteProductLabel">Eliminar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="deleteProductForm">
                                <div class="mb-3">
                                    <label for="productId" class="form-label">ID del Producto a Eliminar</label>
                                    <select class="form-select" id="productId" name="productId" required>
                                        <option value="" selected disabled>Seleccione un producto</option>
                                        <?php
// Reiniciar la consulta de productos para el modal de eliminación
                                        $productos->data_seek(0); // Regresar el puntero al inicio
                                        while ($row = $productos->fetch_assoc()):
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['item']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger" >Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de Confirmación -->
            <div class="modal fade" id="modalConfirmation" tabindex="-1" aria-labelledby="modalConfirmationLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalConfirmationLabel">Operación Exitosa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>La operación se realizó con éxito.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!--h1>Lista de Productos</h1-->

            <div class="product-container">
                <?php
                if ($result && $result->num_rows > 0) {
                    // Salida de datos por cada producto
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='product-card'>
                    <img src='Ruta_Directorio/" . $row["foto"] . "' alt='" . $row["item"] . "'>
                    <h3>" . $row["item"] . "</h3>
                    <p>Tamaño: " . $row["tamano"] . "</p>
                    <p>Descripción: " . $row["descripcion"] . "</p>
                    <p>Stock: " . $row["stock"] . "</p>
                    <p>Precio: " . $row["precio"] . "</p>
                  </div>";
                    }
                } else {
                    echo "<div class='no-products'>No hay productos disponibles.</div>";
                }
                ?>
            </div>
        </div>
        <script>
            // Función para llenar el formulario de edición con los datos del producto seleccionado
            function fetchProductData(id) {
                fetch('getProductData.php?id=' + id) // Crear un archivo PHP para obtener los datos
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('updateItem').value = data.item;
                            document.getElementById('updateTamano').value = data.tamano;
                            document.getElementById('updateDescripcion').value = data.descripcion;
                            document.getElementById('updateStock').value = data.stock;
                            document.getElementById('updatePrecio').value = data.precio;
                            document.getElementById('updateId').value = id;
                        });
            }
        </script>
        <script src="js/jsModalConfirmacion.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

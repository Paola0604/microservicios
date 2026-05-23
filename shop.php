<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zay Shop - Product Listing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Estilos y dependencias -->
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>

    <link href="assets/css/cssheader.css" rel="stylesheet"/>
    <link href="assets/css/cssLoginyRegis.css" rel="stylesheet"/>
</head>

<body>
    <!-- Cabecera -->
    <?php include 'components/header.php'; ?>

    <!-- Inicio del contenido principal -->
    <div class="container py-5">
        <div class="row">
            <!-- Filtro de Categorías -->
            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categorias</h1>
                <!-- Menú de categorías (simplificado) -->
                <!--ul class="list-inline shop-top-menu pb-3 pt-1">
                    <li class="list-inline-item"><a class="h3 text-dark text-decoration-none mr-3" href="#">All</a></li>
                    <li class="list-inline-item"><a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a></li>
                    <li class="list-inline-item"><a class="h3 text-dark text-decoration-none" href="#">Women's</a></li>
                </ul-->
                <!-- Filtros adicionales -->
                <ul class="list-unstyled templatemo-accordion">
                    <!-- Filtro de género -->
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">Pedrial <i class="fa fa-fw fa-chevron-circle-down mt-1"></i></a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#"></a></li>
                            <li><a class="text-decoration-none" href="#"></a></li>
                        </ul>
                    </li>
                    <!-- Filtro de género -->
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">Infraestructura <i class="fa fa-fw fa-chevron-circle-down mt-1"></i></a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#"></a></li>
                            <li><a class="text-decoration-none" href="#"></a></li>
                        </ul>
                    </li>
                    <!-- Filtro de género -->
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">Riego <i class="fa fa-fw fa-chevron-circle-down mt-1"></i></a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#"></a></li>
                            <li><a class="text-decoration-none" href="#"></a></li>
                        </ul>
                    </li>
                    <!-- Filtro de género -->
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">Industrial <i class="fa fa-fw fa-chevron-circle-down mt-1"></i></a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#"></a></li>
                            <li><a class="text-decoration-none" href="#"></a></li>
                        </ul>
                    </li>


                </ul>
            </div>

            <!-- Productos -->
            <div class="col-lg-9">
                <!-- Barra de ordenamiento -->
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex justify-content-end">
                            <select class="form-control">
                                <option>Featured</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Productos listados dinámicamente -->
                <div class="row container-items">
                    <?php
                    // Conexión a la base de datos
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "bdsamuk";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Error de conexión: " . $conn->connect_error);
                    }

                    // Consulta para obtener los productos
                    $sql = "SELECT id, item, descripcion, tamano, precio, stock, foto FROM productos";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="Administrador/Ruta_Directorio/'.$row['foto'].'" alt="'.$row['item'].'">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row['item'].'</h5>
                                        <p class="card-text">Descripción: '.$row['descripcion'].'</p>
                                        <p class="card-text">Tamaño: '.$row['tamano'].'</p>
                                        <p class="card-text text-success">Precio: S/. '.$row['precio'].'</p>
                                        <p class="card-text">Stock: '.$row['stock'].'</p>
                                        <form action="components/add_to_cart.php" method="POST">
                                            <input type="hidden" name="product_id" value="'.$row['id'].'">
                                            <input type="hidden" name="item" value="'.$row['item'].'">
                                            <input type="hidden" name="precio" value="'.$row['precio'].'">
                                            <input type="hidden" name="stock" value="'.$row['stock'].'">
                                            <button type="submit" name="add_to_cart" class="btn btn-secondary mt-2">Agregar al carrito</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '<p>No hay productos disponibles.</p>';
                    }
                    $conn->close();
                    ?>
                </div>

                <!-- Paginación -->
                <div class="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin del contenido principal -->

    <!-- Pie de página -->
    <?php include 'components/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>
</html>
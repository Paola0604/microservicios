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
    <?php include './header.php'; ?>


    <!-- Contenido principal -->
    <div class="container py-5">
        <h1 class="h2 pb-4">Tu Carrito de Compras</h1>
        <div class="row">
            <!-- Tabla del carrito -->
            <div class="col-lg-8">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Disponible</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Iniciar sesión para manejar el carrito
                        session_start();
                        $total = 0;

                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $product) {
                                // Usamos la cantidad seleccionada por el usuario para calcular el total
                                $cantidad = $product['stock'];
                                $subtotal = $product['precio'] * $cantidad;
                    
                                echo '
                                <tr>
                                    <td>'.$product['item'].'</td>
                                    <td>S/. '.$product['precio'].'</td>
                                    <td>'.$product['stock'].'</td>
                                    <td>
                                        <form action="update_cart.php" method="POST">
                                            <input type="hidden" name="product_id" value="'.$key.'">
                                            <input type="number" name="quantity" value="'.$cantidad.'" min="1" class="form-control w-50 d-inline">
                                            <button type="submit" name="update" class="btn btn-secondary btn-sm ml-2">Actualizar</button>
                                        </form>
                                    </td>
                                    <td>S/. '.$subtotal.'</td> <!-- Calculamos correctamente el subtotal -->
                                    <td>
                                        <form action="remove_from_cart.php" method="POST">
                                            <input type="hidden" name="product_id" value="'.$key.'">
                                            <button type="submit" name="remove" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>';
                    
                                // Acumulamos el subtotal al total general
                                $total += $subtotal;
                            }
                        } else {
                            echo '<tr><td colspan="5" class="text-center">No hay productos en el carrito</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Resumen del pedido -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Resumen del Pedido</h5>
                        <p class="card-text">Subtotal: <span class="text-success">S/. <?php echo $total; ?></span></p>
                        <hr>
                        <a href="checkout.php" class="btn btn-primary btn-lg btn-block">Proceder al Pago</a>
                        <a href="/shop.php" class="btn btn-secondary btn-lg btn-block">Seguir Comprando</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin del contenido principal -->

    <!-- Pie de página -->
    <?php include './footer.php'; ?>

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
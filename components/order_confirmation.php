<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdsamuk";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carrito</title>
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
    <div class="container confirmation-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="h4">¡Gracias por tu compra!</h1>
                        <p>Tu pedido ha sido procesado exitosamente.</p>

                        <!-- Aquí puedes mostrar el número de pedido si tienes un sistema de generación de órdenes -->
                        <p class="order-number">Número de pedido: <strong>#<?php echo rand(1000, 9999); // Número de pedido temporal ?></strong></p>

                        <!-- Resumen del pedido -->
                        <div class="order-summary">
                            <h5 class="text-muted">Resumen del Pedido</h5>
                            <ul class="list-group">
                                <!-- Aquí puedes listar los productos comprados si los tienes almacenados en la sesión o base de datos -->
                                <?php
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $product) {
                                        echo '<li class="list-group-item">'.$product['item'].' x '.$product['cantidad'].' - S/. '.$product['precio'].'</li>';
                                    }
                                } else {
                                    echo '<li class="list-group-item">No hay productos en el carrito </li>';
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- Detalles adicionales como total o dirección de envío -->
                        <div class="order-details mt-4">
                            <p><strong>Total: </strong>S/. </p>
                            <!-- <p><strong>Dirección de envío: </strong> [Dirección del cliente]</p> -->
                        </div>

                        <div class="mt-4">
                            <a href="../shop.php" class="btn btn-secondary btn-action">Seguir Comprando</a>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Featured Product -->
   <?php include 'footer.php'; ?>
    
    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js_2.0/LoginyRegistro.js"></script>
    <script src="assets/js_2.0/Carrusel.js"></script>
    <!-- End Script -->
</body>
</html>
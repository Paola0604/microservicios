<?php
session_start(); // Iniciar la sesión

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdsamuk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificamos si el carrito no está vacío
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Iteramos sobre los productos del carrito para actualizar el stock
    foreach ($_SESSION['cart'] as $product_id => $product) {
        $cantidad_solicitada = $product['cantidad'];  // Cantidad comprada
        $stock_disponible = $product['stock'];        // Stock actual

        // Restar la cantidad comprada del stock
        $nuevo_stock = $stock_disponible - $cantidad_solicitada;

        // Verificamos que la cantidad comprada no exceda el stock disponible
        if ($cantidad_solicitada > $stock_disponible) {
            $_SESSION['error_message'] = "No hay suficiente stock para el producto: " . $product['item'];
            header('Location: cart.php');
            exit();  // Detener ejecución si hay un error
        }

        // Aquí iría la lógica para actualizar el stock en la base de datos.
        // Ejemplo de código para actualización de stock en la base de datos:

        // (Esto depende de cómo manejes las conexiones a la base de datos)
        // $query = "UPDATE productos SET stock = $nuevo_stock WHERE id = $product_id";
        // mysqli_query($conn, $query);

        // Actualizamos el stock del producto en la sesión (opcional, si no estás guardando en la base de datos)
        $_SESSION['cart'][$product_id]['stock'] = $nuevo_stock;
    }

    // Vaciar el carrito después de la compra exitosa
    unset($_SESSION['cart']);

    // Redirigir a la página de confirmación de pedido
    header('Location: order_confirmation.php');
    exit();

} else {
    // Si el carrito está vacío, redirigir de vuelta al carrito
    header('Location: cart.php');
    exit();
}
?>
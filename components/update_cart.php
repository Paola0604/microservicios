<?php
session_start();

// Verificamos si se enviaron los datos de producto y cantidad
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);  // Asegúrate de convertirlo a entero

    // Verificamos que el producto exista en el carrito
    if (isset($_SESSION['cart'][$product_id])) {
        $stock_disponible = $_SESSION['cart'][$product_id]['stock'];

        // Si la cantidad solicitada es válida
        if ($quantity > 0 && $quantity <= $stock_disponible) {
            // Actualizamos la cantidad en el carrito
            $_SESSION['cart'][$product_id]['cantidad'] = $quantity;
            unset($_SESSION['error_message']);  // Limpiamos el mensaje de error
        } else {
            // Guardamos un mensaje de error si la cantidad excede el stock disponible
            $_SESSION['error_message'] = "La cantidad solicitada excede el stock disponible para el producto: " . $_SESSION['cart'][$product_id]['item'];
        }
    }
}

// Redireccionamos de vuelta al carrito
header('Location: cart.php');
exit();
?>
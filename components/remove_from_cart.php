<?php
session_start(); // Asegurarse de que la sesión esté iniciada

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Verificar si el carrito está inicializado y si el producto está en el carrito
    if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$product_id])) {
        // Eliminar el producto del carrito
        unset($_SESSION['cart'][$product_id]);
    }

    // Si después de eliminar el producto no queda ninguno en el carrito, destruir la sesión del carrito
    if (isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
}

// Redirigir de vuelta al carrito después de eliminar el producto
header('Location: cart.php');
exit();
?>
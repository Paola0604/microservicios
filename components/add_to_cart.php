<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $item = $_POST['item'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Verificar si la sesión del carrito ya existe
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Agregar el producto al carrito
    $_SESSION['cart'][$product_id] = [
        'item' => $item,
        'precio' => $precio,
        'stock' => $stock,
        'quantity' => 1 // Puedes ajustar la cantidad según sea necesario
    ];

    // Redirigir al usuario a la página de productos
    header('Location: ./cart.php');
    exit();
} else {
    echo "Error: No se pudo agregar el producto.";
}
?>
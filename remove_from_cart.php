<?php
session_start();

if (isset($_POST['remove_item'])) {
    $product_id = $_POST['product_id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
        }
    }

    // Re-indexar el array
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    header('Location: cart.php');
    exit;
}
?>

<?php

session_start();

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];

    $cart_item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $product_quantity
    );

    if (isset($_SESSION['cart'])) {
        $product_ids = array_column($_SESSION['cart'], 'id');

        if (in_array($product_id, $product_ids)) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $product_id) {
                    $_SESSION['cart'][$key]['quantity'] += $product_quantity;
                }
            }
        } else {
            $_SESSION['cart'][] = $cart_item;
        }
    } else {
        $_SESSION['cart'][] = $cart_item;
    }

    header('Location: cart.php');
    exit;
}
?>
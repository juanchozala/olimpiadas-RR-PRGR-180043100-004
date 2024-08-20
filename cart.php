<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="./estilo1.css">
    <title>Carrito de Compras</title>
</head>
<body>
<header>
    <div class="col-12 text-center"></div>
    <h1 class="fs-5">
        <img src="./img\exterior-removebg-preview.png" whidt="50px">
    </h1>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h1>Carrito de Compras</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="categorias.php">Categorias</a>
                    </li>
                    </header>
    
    
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $total = 0;
        echo '<table border="1">';
        echo '<tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Acciones</th></tr>';

        foreach ($_SESSION['cart'] as $item) {
            $item_total = $item['price'] * $item['quantity'];
            $total += $item_total;

            echo '<tr>';
            echo '<td>' . $item['name'] . '</td>';
            echo '<td>' . $item['price'] . '</td>';
            echo '<td>' . $item['quantity'] . '</td>';
            echo '<td>' . $item_total . '</td>';
            echo '<td>
                    <form method="POST" action="remove_from_cart.php">
                        <input type="hidden" name="product_id" value="' . $item['id'] . '">
                        <button type="submit" name="remove_item"> Eliminar </button>
                    </form>
                  </td>';
            echo '</tr>';
        }

        echo '<tr><td colspan="3">Total</td><td>' . $total . '</td><td></td></tr>';
        echo '</table>';
    } else {
        echo '<p>El carrito está vacío.</p>';
    }
    ?>

    <br>
    <a href="categorias.php">Seguir comprando</a>
    <a href="checkout.php">Proceder al pago</a>

</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productosSeleccionados = isset($_POST['producto']) ? $_POST['producto'] : [];

    if (empty($productosSeleccionados)) {
        echo "No seleccionaste ningún producto. <a href='categorias.php'>Volver</a>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilo.css">
    <title>Información de Pago</title>
</head>
<body>
    <h1>Información de Pago</h1>
    
    <h2>Productos Seleccionados:</h2>
    <ul>
        <?php foreach ($productosSeleccionados as $producto): ?>
            <li><?php echo htmlspecialchars($producto); ?></li>
        <?php endforeach; ?>
    </ul>

    <form method="post" action="procesar_pago.php">
        <label for="nombre">Nombre en la tarjeta:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="numero_tarjeta">Número de la tarjeta:</label>
        <input type="text" id="numero_tarjeta" name="numero_tarjeta" required><br><br>

        <label for="fecha_expiracion">Fecha de Expiración:</label>
        <input type="month" id="fecha_expiracion" name="fecha_expiracion" required><br><br>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>

        <input type="hidden" name="producto" value="<?php echo htmlspecialchars(implode(',', $productosSeleccionados)); ?>">

        <input type="submit" value="Procesar Pago">
    </form>
</body>
</html><?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productosSeleccionados = isset($_POST['producto']) ? $_POST['producto'] : [];

    if (empty($productosSeleccionados)) {
        echo "No seleccionaste ningún producto. <a href='productos.php'>Volver</a>";
        exit();
    }
} else {
    // Si se accede directamente a pago.php sin POST, redirigir a productos.php
    header("Location: producto.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Pago</title>
</head>
<body>
    <h1>Información de Pago</h1>
    
    <h2>Productos Seleccionados:</h2>
    <ul>
        <?php foreach ($productosSeleccionados as $producto): ?>
            <li><?php echo htmlspecialchars($producto); ?></li>
        <?php endforeach; ?>
    </ul>

    <form method="post" action="procesar_pago.php">
        <label for="nombre">Nombre en la tarjeta:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="numero_tarjeta">Número de la tarjeta:</label>
        <input type="text" id="numero_tarjeta" name="numero_tarjeta" required><br><br>

        <label for="fecha_expiracion">Fecha de Expiración:</label>
        <input type="month" id="fecha_expiracion" name="fecha_expiracion" required><br><br>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>

        <input type="hidden" name="producto" value="<?php echo htmlspecialchars(implode(',', $productosSeleccionados)); ?>">

        <input type="submit" value="Procesar Pago">
    </form>
</body>
</html>
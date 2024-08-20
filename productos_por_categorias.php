<?php include("administrador/config/bd.php");?>

<?php
?>
<?php 
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
?>    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilo1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <header>
    <div class="col-12 text-center"></div>
    <h1 class="fs-5">
        <img src="./img\exterior-removebg-preview.png" whidt="50px">
    </h1>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="categorias.php">categorias</a>
                    </li>
                </div>
        </div>
    </nav>
    <br>
    <br/><br>

    <div class="container">
    <div class="row"><?php include("administrador/config/bd.php");

// Capturar el ID de la categoría desde la URL
$idCategoria = isset($_GET['id_categorias']) ? $_GET['id_categorias'] : "";

// Preparar y ejecutar la consulta SQL para obtener los productos de la categoría seleccionada
$sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE id_categorias = :id_categorias");
$sentenciaSQL->bindParam(':id_categorias', $idCategoria);
$sentenciaSQL->execute();
$listaproductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1>Productos de la Categoría</h1>
    <div class="row">
        <?php foreach($listaproductos as $productos) {  ?>
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="./img/<?php echo $productos['imagen']; ?>" alt="*">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $productos['nombre']; ?></h4>
                        <form method="POST" action="add_to_cart.php">
        <input type="hidden" name="product_id" value="1">
        <input type="hidden" name="product_name" value="Producto 1">
        <input type="hidden" name="product_price" value="10"> Cantidad: <input type="number" name="product_quantity" value="1" min="1">
        <button type="submit" name="add_to_cart">Agregar al carrito</button>
    </form>

    <!-- Producto 2 -->
    <form method="POST" action="pago.php">
        <input type="hidden" name="product_id" value="2">
        <input type="hidden" name="product_name" value="Producto 2">
        <input type="hidden" name="product_price" value="15">
        Cantidad: <input type="number" name="product_quantity" value="1" min="">
        <form method="post" action="pago.php">
        <input type="submit" value="Proceder al Pago">
    </form>

    <br>
    <a href="cart.php">Ver carrito</a>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Productos</title>
</head>
<body>
    <h1>Seleccionar Productos</h1>
    <form method="post" action="pago.php">
        <input type="submit" value="Proceder al Pago">
    </form>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include("template/pie.php");?>

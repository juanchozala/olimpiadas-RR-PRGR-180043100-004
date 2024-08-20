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
          
        </div>
    </nav>
    <br>
    <br/><br>

    <div class="container">
    <div class="row">

<?php
// Obtener todas las categorías
$sentenciaCategoria = $conexion->prepare("SELECT * FROM categorias");
$sentenciaCategoria->execute();
$listaCategorias = $sentenciaCategoria->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1>Categorías</h1>
    <div class="row">
        <?php foreach($listaCategorias as $categoria) {  ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $categoria['nombre']; ?></h4>
                        <a href="productos_por_categorias.php?id_categorias=<?php echo $categoria['id_categorias']; ?>" class="btn btn-primary">Ver Productos</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include("template/pie.php");?>

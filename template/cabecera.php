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
    <link rel="stylesheet" href="./estilo.css">
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
            <a class="navbar-brand" href="#">MENU</a>
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
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./administrador\index.php">Administrador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cart.php">carrito</a>
                    </li>

            </div>
        </div>
    </nav>
    <br>
    <div class="badge text-bg-primary text-wrap" style="width: 10rem;">
  RECOMENDADOS
</div>
<br>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img\otsport.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img\banner1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img\banner2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="celulares d-flex gap-5 justify-content-center mt-5 flex-wrap"> <!--esto sirve para acoomdar las targetas de las ventas-->
  <div class="card" style="width: 18rem;">
    <img src="./img\mikasa-negro31-382f055c977fd1b89616522098621907-240-0.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title" style="color: antiquewhite";>Mangas Mikasa</h5>
      <p class="card-text" style="color: antiquewhite";>Productos mas vendidos de Voley</p>
      <a href="categorias.php" class="btn btn-primary">Ir a categorias</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img src="./img\canilleras.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title" style="color: antiquewhite";>Canilleras DRB</h5>
      <p class="card-text" style="color: antiquewhite";>Producto mas vendido de Futbol</p>
      <a href="categorias.php" class="btn btn-primary">Ir a categorias</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img src="./img\lentes natacion.webp" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title" style="color: antiquewhite;">Antiparra de Natacion </h5>
      <p class="card-text" style="color: antiquewhite">Producto mas vendidos de Natacion</p>
      <a href="categorias.php" class="btn btn-primary">Ir a categorias</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img src="./img\1724036390_casco.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title" style="color: antiquewhite";>Cascos Rugby</h5>
      <p class="card-text" style="color: antiquewhite";>Producto mas vendido de Rugby</p>
      <a href="categorias.php" class="btn btn-primary">ir a categorias</a>
    </div>
  </div>
    <br/><br>

    <div class="container">
    <div class="row">


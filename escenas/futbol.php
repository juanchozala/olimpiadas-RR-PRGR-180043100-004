<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./estyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <header>
    <div class="col-12 text-center">Tienda</div>
    <h1 class="fs-5">
        <img src="./img/d.png" width="60px">
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
                        <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Producto
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="escenas/futbol.php">futbol</a></li>
                            <li><a class="dropdown-item" href="escenas/rugby.php">rugby</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="escenas/nosotros.php">Nosotros</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
<br>

<div  class="badge text-bg-warning text-wrap text-center " style="width: 20rem">
  Recomendados
</div>
<br>
    
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src=".img\MVA-330.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../img/banner celular.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../img/banner celular 3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
        <div class="container">
        <div class="row">
            <?php 
            $sentencia = $pdo->prepare("SELECT * FROM productos");
            $sentencia->execute(); // Ejecuta la sentencia SELECT
            $listaproducto = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php 
            foreach ($listaproducto as $producto) { ?>
            <div class="col-3">
                <div class="card">              
                    <img 
                        title="<?php echo $producto['nombre'];?>" alt="<?php echo $producto['nombre'];?>" 
                        class="card-img-top" src="<?php echo $producto['imagen'];?>"
                        data-toggle="popover"
                        data-trigger="hover"
                        data-content="<?php echo $producto['descripcion'];?>"
                        height="317px"
                    >
                    <div class="card-body">
                        <p><?php echo $producto['nombre'];?></p>
                        <h5 class="card-title">$<?php echo $producto['precio'];?></h5>
                        <p class="card-text">Descripción</p>

                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY);?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY);?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY);?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">

                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
    </div>
        </div>
      </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/index.js"></script>
</header>
</body>





<main></main>
<footer></footer>
</html>
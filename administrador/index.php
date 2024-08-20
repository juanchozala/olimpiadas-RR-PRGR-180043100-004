<!doctype html>
<html lang="en">
  <head>
    <title>administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
 if(($_POST['usuario']=="juan") && ($_POST['contrasenia']=="juanchox")){
    $_SESSION['usuario']="ok"; // Utiliza la superglobal $_SESSION para mantener el estado entre páginas
    $_SESSION['nombreUsuario']="juan";

    header('Location:inicio.php'); // Cambia la URL de destino a donde quieras redirigir al administrador
    exit(); // Es importante llamar a exit() después de header() para evitar errores
  } else {
    $mensaje="Error: El usuario o contraseña son incorrectos";
  }
}
?>


           <!--le agrego para que se separe-->
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
            <br> <br> <br>
                <div class="card">
                    <div class="card-header">
                    Login
                    </div>

                    <div class="card-body">
                     <?php if(isset($mensaje)){ ; ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje;?>
                      </div>
                      <?php } ?>

                    <form method="POST"> <!--coloco el metodo de envio-->
                    <div class = "form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                    <input type="texto" class="form-control" name="usuario" placeholder="Escribe tu usuario">
                    
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" name="contrasenia" placeholder="Escribe tu contraseña">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Entrar al administrador</button>
                    </form>
                    
                    

                    </div>
                    
                 

            </div>
            
        </div>
      </div>
     </body>
</html>
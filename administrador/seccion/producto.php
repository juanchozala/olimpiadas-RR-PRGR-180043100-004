<!-- INCLUIR CABECERA -->
<?php include("../template/cabecera.php");?>

<!-- Captura los valores enviados desde el formulario HTML utilizando el método POST y asigna estos valores a variables -->
<?php
$txtID = isset($_POST['txtID']) ? $_POST['txtID'] : "";
$txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : "";
$txtImagen = isset($_FILES['txtImagen']['name']) ? $_FILES['txtImagen']['name'] : "";
$txtCategoria = isset($_POST['txtCategoria']) ? $_POST['txtCategoria'] : "";
$accion = isset($_POST['acciones']) ? $_POST['acciones'] : "";

// Incluir la conexión con la base de datos
include("../config/bd.php");

switch ($accion) {
    case 'Agregar':
        // Código para agregar un nuevo registro en la base de datos
        $sentenciaSQL = $conexion->prepare("INSERT INTO productos (nombre, imagen, id_categorias) VALUES (:nombre, :imagen, :id_categorias);");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':id_categorias', $txtCategoria);

        // Adjuntar imagen a la carpeta img
        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();
        header("Location:producto.php");
        break;

    case 'Modificar':
        // Código para modificar un registro existente en la base de datos
        $sentenciaSQL = $conexion->prepare("UPDATE productos SET nombre=:nombre, id_categorias=:id_categorias WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':id_categorias', $txtCategoria);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        if ($txtImagen != "") {
            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
            $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);

            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($producto["imagen"]) && ($producto["imagen"] != "imagen.jpg")) {
                if (file_exists("../../img/" . $producto["imagen"])) {
                    unlink("../../img/" . $producto["imagen"]);
                }
            }

            $sentenciaSQL = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
        }
        header("Location:producto.php");
        break;

    case 'Cancelar':
        header("Location:producto.php");
        break;

    case 'seleccionar':
        $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtNombre = $producto['nombre'];
        $txtImagen = $producto['imagen'];
        $txtCategoria = $producto['id_categoria'];
        break;

    case 'borrar':
        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if (isset($producto["imagen"]) && ($producto["imagen"] != "imagen.jpg")) {
            if (file_exists("../../img/" . $producto["imagen"])) {
                unlink("../../img/" . $producto["imagen"]);
            }
        }

        $sentenciaSQL = $conexion->prepare("DELETE FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        header("Location:producto.php");
        break;
}

// Preparar y ejecutar la sentencia SQL para seleccionar todos los registros de la tabla productos
$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaproductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$sentenciaCategorias = $conexion->prepare("SELECT * FROM categorias");
$sentenciaCategorias->execute();
$listaCategorias = $sentenciaCategorias->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- PREPARACIÓN DEL CRUD -->
<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos del producto
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                </div>
   
                <div class="form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del producto">
                </div>

                <div class="form-group">
                    <label for="txtCategoria">Categoría:</label>
                    <select class="form-control" name="txtCategoria" id="txtCategoria">
                        <?php foreach ($listaCategorias as $categoria) { ?>
                            <option value="<?php echo $categoria['id_categorias']; ?>" <?php echo ($txtCategoria == $categoria['id_categorias']) ? 'selected' : ''; ?>>
                                <?php echo $categoria['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="txtImagen">Imagen:</label>
                    <br>
                    <?php if ($txtImagen != "") { ?>
                        <img src="../../img/<?php echo $txtImagen; ?>" width="50" alt="" srcset="">
                    <?php } ?>
                    <input type="file" class="form-control" id="txtImagen" name="txtImagen" placeholder="Imagen del producto">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="acciones" <?php echo ($accion == "seleccionar") ? "disabled" : ""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="acciones" <?php echo ($accion != "seleccionar") ? "disabled" : ""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="acciones" <?php echo ($accion != "seleccionar") ? "disabled" : ""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tabla de productos (mostrar los datos de los productos) -->
<div class="col-md-7">    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CATEGORÍA</th>
                <th>IMAGENES</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaproductos as $producto) { ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php
                        foreach ($listaCategorias as $categoria) {
                            if ($categoria['id_categorias'] == $producto['id_categorias']) {
                                echo $categoria['nombre'];
                                break;
                            }
                        }
                    ?></td>
                    <td>
                        <img src="../../img/<?php echo $producto['imagen']; ?>" width="50" alt="" srcset="">
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['id']; ?>"/>
                            <input type="submit" name="acciones" value="seleccionar" class="btn btn-primary"/>
                            <input type="submit" name="acciones" value="borrar" class="btn btn-danger"/>
                        </form> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("../template/pie.php");?>

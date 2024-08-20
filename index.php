<?php 
include ("template/cabecera.php");
?>        
            <?php 
            $sentencia = $pdo->prepare("SELECT * FROM productos");
            $sentencia->execute(); // Ejecuta la sentencia SELECT
            $listaproducto = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>


           
                </div>
            </div>
        </div>    
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>

    <?php include ("template/pie.php");?>
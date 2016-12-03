<?php
$titulo = "Subir prueba";
$pagina = "subir";
?>
<?php require 'inc/encabezado.inc'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-center col-border">
                <h2 class="text-center">Subir archivos</h2>
                <hr />
                <?php
                
                require_once 'lib/config.php';
                    
                spl_autoload_register( function ($clase){
                    require_once "lib/$clase.php";
                }); 
                $resultado = array();
                $nombreimg = array();
                
                if($_POST){
                    
                    extract($_POST, EXTR_OVERWRITE);
                    
                        if(!file_exists("img")){ 
                            mkdir("img", 0777);
                        }

                        $car = "prueba"; 
                        $carpeta = "img/$car/";

                        if(!file_exists($carpeta)){
                            mkdir($carpeta, 0777);
                        }
                    
                        if($tipo && $des){
                            $subir = new subirimg($carpeta);
                            $subir->doSubir();
                            
                            $resultado = $subir->mensages();
                            $nombreimg = $subir->nomimg();
                            
                            $imgen = $carpeta.implode($nombreimg);
                            $fecha = date('Y-m-d');
                            $hora = date('h:i:s');
                            
                            $db = new database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                            if($db->preparar("INSERT INTO prueba VALUE (NULL, '$tipo', '$des', '$imgen', '$fecha', '$hora')")){
                                $db->ejecutar();
                                $db->cerrar();
                            }
                        }
                            
                }
                ?>
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                   <div class="form-group">
                        <label for="">Tipo</label>
                        <input type="text" name="tipo" class="form-control" id="" />
                    </div>
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea name="des" class="form-control" id="" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Elegir archivo</label>
                        <input type="file" name="archivos" class="form-control" id="" />
                    </div>
                    <input type="submit" name="subir" class="btn btn-primary" id="" />
                </form>
                <?php
                if(is_array($resultado)){
                    foreach ($resultado as $mensajes){ 
                        echo "
                              <div class='alert alert-info alert-dismissible fade in' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    <strong>$mensajes</strong>
                                </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="js/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

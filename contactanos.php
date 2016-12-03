<?php
$titulo = "Contactanos";
$pagina = "contacto";
?>
<?php require 'inc/encabezado.inc'; ?>
<?php require 'inc/menu.inc'; ?>
<header id="yosed-contac">
    <div class="container">
        <div class="row">
            
        </div>
    </div>
</header>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Contactanos</h1>
                <hr />
            </div>
            <div class="col-md-12">
               <?php 
                if($_POST){
                    extract($_POST, EXTR_OVERWRITE);
                    $asunto = 'Página de Yozcode';
                    $para = 'yosed.temiguel@gmail.com';
                    $msg = "
                    Nombre: $nombre \n
                    Apellidos: $ape \n
                    E-mail: $email \n
                    Fecha: ".date('d/m/y')." \n
                    Hora: ".date('h:i:s a')." \n
                    Mensaje: \n
                    $comen
                    ";
                    $validar = mail( $para, $asunto, $msg );
                    
                    if($validar){
                        header("Location: exito");
                    }else{
                        header("Location: fallido");
                    }
                }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="POST" role="form">
                            <legend>Queremos saber tu opinion<br /></legend>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input name="nombre" type="text" class="form-control" id="" placeholder="Juna" />
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input name="ape" type="text" class="form-control" id="" placeholder="Marquez" />
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input name="email" type="email" class="form-control" id="" placeholder="ejemplo@ejemplo.com" />
                            </div>
                            <div class="form-group">
                                <label for="">Comentario</label>
                                <textarea name="comen" class="form-control" id="" rows="5"></textarea>

                            </div>
                            <input type="submit" class="btn btn-primary" value="Enviar" />
                        </form>
                    </div>
                    <div class="col-md-6 text-center">
                        <h3>YosedCode</h3>
                        <p>Nos ubicamos en la calle nueva</p>
                        <p>Codigo postal: 41160</p>
                        <p>Chilapa Guerrero Mexico</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="yosed-maps">
    <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3803.1443665239267!2d-99.16897318559573!3d17.595878201390967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c958f5395c8051%3A0x56515f81044a472d!2sConalep%2C+41100+Chilapa+de+%C3%81lvarez%2C+Gro.!5e0!3m2!1ses-419!2smx!4v1468985629084" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>
<?php require 'inc/footer.inc'; ?>

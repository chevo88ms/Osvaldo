<?php
$titulo = "Fallo el envio";
$pagina = "fail";
?>
<?php require 'inc/encabezado.inc'; ?>
<?php require 'inc/menu.inc'; ?>

<section id="email-fail">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-border col-center">
                <h2 class="text-center">Mensage no enviado</h2>
                <hr />
                <p>Su email no se enviado con exito</p>
                <p class="text-center">;) <br />
                <a class="btn btn-primary" href="/">Regresar</a></p>
            </div>
        </div>
    </div>
</section>

<?php require 'inc/footer.inc'; ?>
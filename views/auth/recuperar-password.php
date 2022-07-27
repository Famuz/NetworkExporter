<h1 class="nombre-pagina">Recuperar password</h1>
<p class="descripcion-pagina">Coloca tu nuevo password a continuación</p>


<?php include_once __DIR__ . "/../templates/alertas.php"; ?>
<?php if($error) return null ?>

<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            name="password"
            placeholder="Tu password"
        />
    </div><!-- .campo -->

    <input type="submit" class="boton" value="Guardar Nuevo Password"><!-- .boton -->

</form><!-- .formulario -->

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia sesión aquí</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
</div><!-- .acciones -->
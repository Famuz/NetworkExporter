<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Ingresa con tus datos</p>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form action="/" class="formulario" method="POST">
    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu email"
        />
    </div><!-- .campo -->

    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            name="password"
            placeholder="Tu password"
        />
    </div><!-- .campo -->

    <input type="submit" class="boton" value="Iniciar sesión"><!-- .boton -->

</form><!-- .formulario -->

<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div><!-- .acciones -->
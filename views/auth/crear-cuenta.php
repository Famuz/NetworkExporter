<h1 class="nombre-pagina">Crear cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form action="/crear-cuenta" class="formulario" method="POST">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Tu Nombre" 
            value="<?php echo s($usuario->nombre); ?>"
            >
    </div><!-- .campo -->

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
            type="text"
            id="apellido"
            name="apellido"
            placeholder="Tu Apellido"
            value="<?php echo s($usuario->apellido); ?>"
            >
    </div><!-- .campo -->

    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu email"
            value="<?php echo s($usuario->email); ?>"
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

    <input type="submit" class="boton" value="Crear cuenta"><!-- .boton -->

</form><!-- .formulario -->

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia sesión aquí</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div><!-- .acciones -->
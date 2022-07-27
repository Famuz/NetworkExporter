<h1 class="nombre-pagina">Panel de Administración</h1>
<?php 
    include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar Importaciones</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input 
                type="date"
                id="fecha"
                name="fecha"
                value="<?php echo $fecha; ?>"
            >
        </div><!-- .campo -->
    </form><!-- .formulario -->
</div><!-- .busqueda -->

<?php 
    if(count($importaciones) === 0 ) {
        echo "<h2>No hay importaciones en esta fecha</h2>";
    }
?>

<div class="importacion-admin">
    <ul class="importaciones">
        <?php
            foreach($importaciones as $importacion) {
                if ($importacion->estado == 1) {
                    $estado = 'En proceso';
                } else {
                    $estado = 'Completado';
                }
        ?>
        <li>
            <p>ID: <span><?php echo $importacion->id; ?></span></p>
            <p>Fecha: <span><?php echo $importacion->fecha; ?></span></p>
            <p>Estado: <span><?php echo $estado; ?></span></p>
            <p>Usuario: <span><?php echo $importacion->usuario; ?></span></p>
            <p>Email: <span><?php echo $importacion->email; ?></span></p>
            <p>Tipo: <span><?php echo $importacion->tipo; ?></span></p>
            <p>SubTipo: <span><?php echo $importacion->subTipo; ?></span></p>
            <p>Alimentadores: <span><?php echo $importacion->alimentadores; ?></span></p>
            <form action="/api/actualizarEstado" method="POST">
                <input type="hidden" name="id" value="<?php echo $importacion->id; ?>">
                <input type="submit" class="boton-actualizar" value="Cambiar estado">
            </form>
        </li>
        <?php }// Fin de Foreach ?> 
    </ul><!-- .importaciones -->
</div><!-- .importaciones-admin -->

<?php 
    $script = "<script src='build/js/admin.js'></script>"
?>
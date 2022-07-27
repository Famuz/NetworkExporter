<h1 class="nombre-pagina">Importacion</h1>
<p class="descripcion-pagina">Bienvenido a la creación de importaciones</p>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
?>

<div id="app">
    <nav class="tabs">
            <button type="button" data-paso="1">Informacion</button>
            <button type="button" data-paso="2">Resumen</button>
    </nav>

    <div id="paso-1" class="seccion">
    <p class="text-center">Coloca los datos necesarios para importar</p>
    
    <form name="formulario" action="" class="formulario"  method="POST">
        <!-- <div class="campo">
            <label for="nombre">Nombre</label>
            <input
                id="nombre"
                type="text"
                placeholder="Usuario"
                value="<?php echo $nombre; ?>"
                disabled
                />
        </div> --><!-- .campo -->

        <div class="campo">
            <label for="tipo">Tipo</label>
            <div id="tipos" class="listado-tipo"></div><!-- #tipo .listado-tipo -->
        </div><!-- .campo -->

        <div class="campo">
            <label for="subTipo">SubTipo</label>
            <div id="subtipos" class="listado-subtipo"></div><!-- #subtipo .listado-subtipo -->
        </div><!-- .campo -->

        <div class="campo">
            <label for="alimentadores">Alimentadores</label>
            <div class="listado-alimentadores"></div><!-- #subtipo .listado-subtipo -->
        </div><!-- .campo -->

        <input type="hidden" id="id" value="<?php echo $id; ?>">

    </form><!-- .formulario -->

    </div><!-- #paso-1 .seccion -->

    <div id="paso-2" class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta</p>
    </div><!-- #paso-3 .seccion -->

    <div class="paginacion">
        <button
            id="anterior"
            class="boton"
        >&laquo; Anterior</button><!-- button -->

        <button
            id="siguiente"
            class="boton"
        >Siguiente &raquo;</button><!-- button -->

    </div>
    
</div><!-- #app -->

<?php 
    $script = "
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>
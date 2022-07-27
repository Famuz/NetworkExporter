<?php 

namespace Controllers;
use MVC\Router;

class ImportacionController {
    public static function index ( Router $router ) {
        isAuth();

        $router->render('importacion/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
    
}

?>
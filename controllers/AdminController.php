<?php

namespace Controllers;

use Model\AdminImportacion;
use MVC\Router;

class AdminController {
    public static function index( Router $router ) {
        isAdmin();

        $fecha = $_GET['fecha'] ?? date('Y-m-d');
        $fechas = explode('-', $fecha);

        if( !checkdate($fechas[1], $fechas[2], $fechas[0])) {
            header('Location: /404');
        } 

        // Construimos la fecha a consultar
        $fechaConsulta = $fechas[1] . '/' . $fechas[2] . '/' . $fechas[0];

        // debuguear($fecha);
        // Consultar la base de datos
        $consulta = "SELECT importacion.id, CONCAT(usuarios.nombre, ' ', usuarios.apellido) AS 'usuario', ";
        $consulta .= " usuarios.email, tipo, subTipo, alimentadores, fecha, estado  ";
        $consulta .= " FROM importacion ";
        $consulta .= " INNER JOIN dbo.usuarios ";
        $consulta .= " ON fk_usuario = usuarios.id  ";
        $consulta .= " WHERE fecha like '%${fechaConsulta}%'";
        //debuguear($consulta);

        $importaciones = AdminImportacion::SQL($consulta);

        //debuguear($importaciones);

        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'importaciones' => $importaciones,
            'fecha' => $fecha
        ]);
    }
 }
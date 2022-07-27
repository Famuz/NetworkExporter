<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\AlimentadorController;
use Controllers\ApiController;
use Controllers\ImportacionController;
use Controllers\LoginController;
use Controllers\SubtipoController;
use Controllers\TipoController;
use MVC\Router;
$router = new Router();

// Iniciar Sesión
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar Password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

// Crear Cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

// Confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

// AREA PRIVADA
$router->get('/importacion', [ImportacionController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);

// API de tipo
$router->get('/api/tipo',[ApiController::class, 'indexTipo']);

// API de subTipo
$router->get('/api/subTipo',[ApiController::class, 'indexSubtipo']);

// API de alimentador
$router->get('/api/alimentador',[ApiController::class, 'indexAlimentador']);

// API de importacion
$router->post('/api/importacion',[ApiController::class, 'guardar']);
$router->post('/api/actualizarEstado',[ApiController::class, 'actualizarEstado']);

// CRUD de Tipo -> SOON
$router->get('/tipo', [TipoController::class,'index']);
$router->get('/tipo/crear', [TipoController::class,'crear']); // Lee los datos con get
$router->post('/tipo/crear', [TipoController::class,'crear']); // Envia los datos con post
$router->get('/tipo/actualizar', [TipoController::class,'actualizar']);
$router->post('/tipo/actualizar', [TipoController::class,'actualizar']);
$router->post('/tipo/eliminar', [TipoController::class,'eliminar']);

// CRUD de SubTipo -> SOON
$router->get('/subtipo', [SubtipoController::class,'index']);
$router->get('/subtipo/crear', [SubtipoController::class,'crear']); // Lee los datos con get
$router->post('/subtipo/crear', [SubtipoController::class,'crear']); // Envia los datos con post
$router->get('/subtipo/actualizar', [SubtipoController::class,'actualizar']);
$router->post('/subtipo/actualizar', [SubtipoController::class,'actualizar']);
$router->post('/subtipo/eliminar', [SubtipoController::class,'eliminar']);

// CRUD de Alimentadores -> SOON
$router->get('/alimentador', [AlimentadorController::class,'index']);
$router->get('/alimentador/crear', [AlimentadorController::class,'crear']); // Lee los datos con get
$router->post('/alimentador/crear', [AlimentadorController::class,'crear']); // Envia los datos con post
$router->get('/alimentador/actualizar', [AlimentadorController::class,'actualizar']);
$router->post('/alimentador/actualizar', [AlimentadorController::class,'actualizar']);
$router->post('/alimentador/eliminar', [AlimentadorController::class,'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

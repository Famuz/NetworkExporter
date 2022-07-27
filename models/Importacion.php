<?php

namespace Model;

class Importacion extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'importacion';
    protected static $columnasDB = ['id','tipo','subtipo','alimentadores','fecha', 'estado','fk_usuario',];

    public $id;
    public $tipo;
    public $subtipo;
    public $alimentadores;
    public $fecha;
    public $estado;
    public $fk_usuario;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->subtipo = $args['subtipo'] ?? '';
        $this->alimentadores = $args['alimentadores'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->estado = $args['estado'] ?? 0;
        $this->fk_usuario = $args['fk_usuario'] ?? '';
    }
}
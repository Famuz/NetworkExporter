<?php

namespace Model;

class SubTipo extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'subTipo';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($arg = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }
}
<?php

namespace Model;

class Tipo extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'tipo';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($arg = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    // Mensajes de Validación para la creación de una cuenta
    public function validarTipo() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre del Cliente es Obligatorio';
        }

        return self::$alertas;
    }
}
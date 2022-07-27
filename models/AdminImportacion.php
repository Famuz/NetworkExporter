<?php 

namespace Model;

class AdminImportacion extends ActiveRecord {
    protected static $tabla = 'importacion';
    protected static $columnasDB = ['id','usuario','email','tipo','subTipo','alimentadores','fecha', 'estado'];

    public $id;
    public $usuario;
    public $email;
    public $tipo;
    public $subTipo;
    public $alimentadores;
    public $fecha;
    public $estado;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->usuario = $args['usuario'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->subTipo = $args['subTipo'] ?? '';
        $this->alimentadores = $args['alimentadores'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->estado= $args['estado'] ?? 0;
    }
}
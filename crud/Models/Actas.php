<?php

namespace Models;

require_once 'Models/Usuario.php';

use app\Model;
use Models\Usuario;

class Detalle extends Model
{

    protected string $table = 'Actas';

    private $id;
    private $usuarioId;
    private $titulo;
    private $fecha;
    private $agenda;
    private $observaciones;
    private $lugar;
    private ?Usuario $usuario = null;

    public function __construct()
    {
        parent::__construct();

        $this->id = -1;
        $this->fecha = '';
        $this -> titulo = '';
        $this->usuarioId = '';
        $this->agenda = '';
        $this->observaciones = '';
        $this->lugar = '';

    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function agenda()
    {
        return $this->agenda;
    }
    
    public function getObservaciones()
    {
        return $this->observaciones;
    }
    
    public function getLugar()
    {
        return $this->lugar;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setAgenda($agenda)
    {
        $this->agenda = $agenda;
    }
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;
    }



    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    
    public function toArray()
    {
        $data = [
            'id' => $this->id,
            'usuarioId' => $this->usuarioId,
            'fecha' => $this->fecha,
            'titulo' => $this->titulo,
            'agenda' => $this->agenda,
            'observaciones' => $this->observaciones
        ];
        

        if($this->usuario != null){
            $data['usuario'] = $this->usuario->toArray();
        }
        return $data;
        
    }   
}

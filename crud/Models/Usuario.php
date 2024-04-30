<?php

namespace Models;

require_once 'App/Model.php';

use app\Model;

class Usuario extends Model
{

    protected string $table = 'usuarios';

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $contraseña;
    private $telefono;
    private $fecha_nacimiento;

    public function __construct()
    {
        parent::__construct();
        
        $this->id = -1;
        $this->nombre = '';
        $this->apellido = '';
        $this->email = '';
        $this->contraseña = '';
        $this->telefono = '';
        $this->fecha_nacimiento = '';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getContraseña(){
        return $this->contraseña;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setContraseña($contraseña){
        $this->contraseña = $contraseña;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'contraseña' => $this->contraseña,
            'telefono' => $this->telefono,
            'fecha_nacimiento' => $this->fecha_nacimiento
        ];
    }
}

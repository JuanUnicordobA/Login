<?php

namespace Controller;

require_once 'Utils/JsonResponse.php';
require_once 'Models/Asistente.php';

use Models\Usuario;
use Utils\JsonResponse;

class AsistenteController
{

    public function index()
    {
        $usuarios = new Usuarios();

        JsonResponse::send(
            200,
            'Lista de usuarios',
            $usuarios->all()
        );
    }

    public function store()
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $usuario = new Usuario();

        $id = $usuario->create([
            'nombre' => $requestData['nombre'],
            'apellido' => $requestData['apellido'],
            'email' => $requestData['email'],
            'contraseña' => $requestData['contraseña'],
            'telefono' => $requestData['telefono'],
            'fecha_nacimiento' => $requestData['fecha_nacimiento']
        ]);


        JsonResponse::send(
            201,
            'Usuario creado',
            ['id' => $id]
        );
    }

    public function read($id)
    {
        $usuario = new Usuario();

        $usuario = $usuario->find($id);

        JsonResponse::send(
            200,
            'Usuario encontrado',
            $asistente
        );
    }

    public function update($id)
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $usuario = new Usuario();

        $asistente->update([
            'nombre' => $requestData['nombre'],
            'apellido' => $requestData['apellido'],
            'email' => $requestData['email'],
            'contraseña' => $requestData['contraseña'],
            'telefono' => $requestData['telefono'],
            'fecha_nacimiento' => $requestData['fecha_nacimiento']
        ], $id);

        JsonResponse::send(
            200,
            'Usuario actualizado',
            ['id' => $id]    
        );
    }

    public function delete($id)
    {
        $usuario = new Usuario();

        $usuario->delete($id);

        JsonResponse::send(
            200,
            'Usuario eliminado',
            null
        );
    }
}

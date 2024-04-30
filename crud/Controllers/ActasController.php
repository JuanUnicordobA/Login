<?php

namespace Controller;

require_once 'Utils/JsonResponse.php';
require_once 'Models/Actas.php';


use Models\Actas;
use Utils\JsonResponse;

class ActasController
{

    public function index()
    {
        $actas = new actas();

        JsonResponse::send(200, 'Lista de actas', $actas->all() );
    }

    public function store()
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $actas = new actas();

        $id = $acta->create([
            'usuario_id' => $requestData['usuario_id'],
            'fecha' => $requestData['fecha'],
            'titulo' => $requestData['titulo'],
            'agenda' => $requestData['agenda'],
            'observaciones' => $requestData['observaciones'],
            'lugar' => $requestData['lugar']
        ]);

        JsonResponse::send(
            201,
            'Acta creada',
            ['id' => $id]
        );
    }

    public function read($id)
    {
        $acta = new acta();

        $acta = $acta->acta($id);

        JsonResponse::send(
            200,
            'Acta encontrada',
            $acta
        );
    }

    public function update($id)
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $acta = new Acta();

        $acta = $acta->update([
            'usuario_id' => $requestData['usuario_id'],
            'fecha' => $requestData['fecha'],
            'titulo' => $requestData['titulo'],
            'agenda' => $requestData['agenda'],
            'observaciones' => $requestData['observaciones'],
            'lugar' => $requestData['lugar']
        ], $id);

        JsonResponse::send(
            200,
            'Acta actualizada',
            ['id' => $id]
        );
    }

    public function delete($id)
    {
        $acta = new Acta();

        $acta->acta($id);

        JsonResponse::send(
            200,
            'Acta eliminada',
            null
        );
    }
}

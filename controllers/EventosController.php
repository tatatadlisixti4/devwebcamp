<?php

namespace Controllers;


use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use MVC\Router;

class EventosController {
    public static function index(Router $router) {
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops'
        ]);
    }
    public static function crear(Router $router) {
        $alertas = [];
        $evento = new Evento();

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evento = new Evento();
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();

            if(empty($alertas)) {
                $resultado = $evento->guardar();
                if($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }
}

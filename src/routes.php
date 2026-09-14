<?php

$router = new Router();

// Route pour la page d'accueil
$router->get('/', function() {
    $repository = new ResourceRepository();
    $resources = $repository->all();
    $view = 'resources/index';
    require_once BASE_PATH . '/views/layouts/main.php';
});

// Vos routes pour les ressources
$router->get('/resources', [ResourceController::class, 'index']);
$router->get('/resources/create', [ResourceController::class, 'create']);
$router->post('/resources/store', [ResourceController::class, 'store']);
$router->get('/resources/edit', [ResourceController::class, 'edit']);
$router->post('/resources/update', [ResourceController::class, 'update']);
$router->post('/resources/delete', [ResourceController::class, 'delete']);

// Traitement de la route active
$router->route($uri, $method);
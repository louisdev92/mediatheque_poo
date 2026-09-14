<?php
session_start();
define('BASE_PATH', dirname(__DIR__));

function h($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

// Chargement des classes de base
require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/src/Database.php';
require_once BASE_PATH . '/src/FlashMessage.php';
require_once BASE_PATH . '/src/Validator.php';
require_once BASE_PATH . '/src/Resource.php';
require_once BASE_PATH . '/src/ResourceRepository.php';
require_once BASE_PATH . '/src/Router.php'; // 1. On charge la classe Router

// Chargement du contrôleur
require_once BASE_PATH . '/Controllers/ResourceController.php';

// Récupération de l'URI et de la méthode
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// 2. On charge le fichier qui instancie le routeur et lance la recherche
require_once BASE_PATH . '/src/routes.php';
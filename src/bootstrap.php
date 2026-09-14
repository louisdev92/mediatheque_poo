<?php

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Resource.php';
require_once __DIR__ . '/ResourceRepository.php';
require_once __DIR__ . '/Validator.php';
require_once __DIR__ . '/FlashMessage.php';

function h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $path): never
{
    header('Location: ' . $path);
    exit;
}

$config = require __DIR__ . '/../config/database.php';
$database = new Database($config);
$repository = new ResourceRepository($database->getConnection());


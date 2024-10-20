<?php
require_once __DIR__ . '/../vendor/autoload.php';


use App\Router;
use App\Controller\TaskController;

// Activer les erreurs pour débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$router = new Router();
$taskController = new TaskController();

// Ajouter les routes
$router->addRoute('/', [$taskController, 'listTasks']);
$router->addRoute('/tasks', [$taskController, 'listTasks']);
$router->addRoute('/add', [$taskController, 'addTask']);

// Normaliser le chemin demandé
$requestUri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Dispatcher la requête normalisée
$router->dispatch($requestUri);

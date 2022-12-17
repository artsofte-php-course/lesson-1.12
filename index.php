<?php

use Controller\ProjectController;
use Http\Request;
use Http\Response;
use Http\Router;
use Repository\Database\ProjectRepository as DatabaseProjectRepository;
use Repository\ProjectRepository;

include_once 'config.php';
include_once 'routes.php';


// Autoloading
spl_autoload_register(function($className) {
    
    $path = __DIR__ . DIRECTORY_SEPARATOR . 
                    str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php";
    require_once $path;
});

// Create request
$request = Request::createFromGlobals();


// Create connection and repo, controllers
$pdo = new PDO($dsn, $username, $password);

$projectRepository = new DatabaseProjectRepository(
    $pdo
);


$controllers = [
    'Controller\ProjectController' => new ProjectController($projectRepository)
]; 

// Routing
$router = new Router($routes);
$route = $router->match($request);

$controller = $controllers[$route['controller']];
$action = $route['action'];


$response = $controller->$action();
$response->send();




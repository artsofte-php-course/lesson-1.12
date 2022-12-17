<?php

$routes = [
    'projectList' => [
        'method' => 'GET', 
        'path' => '/',
        'controller' => 'Controller\ProjectController',
        'action' => 'list'
    ],

    'projectForm' => [
        'method' => 'GET',
        'path' => '/create',
        'controller' => 'Controller\ProjectController',
        'action' => 'showProjectForm'
    ],

    'projectCreate' => [
        'method' => 'POST', 
        'path' => '/create',
        'controller' => 'Controller\ProjectController',
        'action' => 'create'
    ]
];
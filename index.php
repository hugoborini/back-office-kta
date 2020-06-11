<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Handlers\Strategies\RequestResponseArgs;

// Composer autoloader
require __DIR__ . '/vendor/autoload.php';
require "controller/controller.php";

// Instanciation de l'application Slim
$app = AppFactory::create();

$app->setBasePath("/back-office-kta");

// Stratégie de route:
$app->getRouteCollector()
    ->setDefaultInvocationStrategy(new RequestResponseArgs());

// Route - page d'accueil
$app->get('/{name}', function (Request $request, Response $response, $name) {
    $response->getBody();
    echo "hello " . $name;
    return $response;
});

// Démarrage de l'application
$app->run();
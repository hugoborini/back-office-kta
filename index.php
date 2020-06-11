<?php
session_start();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Handlers\Strategies\RequestResponseArgs;

// Composer autoloader
require __DIR__ . '/vendor/autoload.php';
require "controller/controller.php";

// Instanciation de l'application Slim
$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->setBasePath("/back-office-kta");

// Stratégie de route:
$app->getRouteCollector()
    ->setDefaultInvocationStrategy(new RequestResponseArgs());

// Route - page d'accueil
$app->get('/', function (Request $request, Response $response) {
    $response->getBody();
    include 'views/login.php';

    return $response;
});

$app->post('/checkAccount', function (Request $request, Response $response){
    $response->getBody();
    checkAccount($_POST['user'], $_POST['pass']);
    return $response;
});

$app->get('/admin', function (Request $request, Response $response) {
    $response->getBody();
    if(isset($_SESSION['user']) && isset($_SESSION['pass'])) {
        if($_SESSION['user'] == 'admin' && $_SESSION['pass'] == 'pass'){
            include 'views/admin.php';
           showAllRoom();
        }
    }
    return $response;
});

$app->get('/admin/{room_id}', function (Request $request, Response $response, $room_id) {
    $response->getBody();
    showAroom($room_id);
    include 'views/roomPage.php';
    return $response;
});

$app->get('/delete/{room_id}', function (Request $request, Response $response, $room_id) {
    $response->getBody();
    deleteARoom($room_id);
    return $response;
});

// Démarrage de l'application
$app->run();
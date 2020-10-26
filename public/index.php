<?php
header("Access-Control-Allow-Origin: *");
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';


$app = new \Slim\App;

// Ruta de la encuesta;

require '../src/autofact/formulario.php';

$app->run();
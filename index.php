<?php

$env = 'dev';
$_ENV = json_decode(
    file_get_contents("src/Configs/" . $env . ".config.json"),
    true
);
$_ENV['env'] = $env;

require_once 'autoload.php';

use Helpers\HttpRequest;
use Helpers\HttpResponse;
use Services\DatabaseService;
use Controllers\DatabaseController;
use Tools\Initializer;

$request = HttpRequest::instance();
if (
    $_ENV['env'] == 'dev' && !empty($request->route) && $request->route[0] ==
    'init'
) {
    if (Initializer::start($request)) {
        HttpResponse::send(["message" => "Api Initialized"]);
    }
    HttpResponse::send(["message" => "Api Not Initialized, try again ..."]);
}


$tables = DatabaseService::getTables();
if (empty($request->route) || !in_array($request->route[0], $tables)) {
    HttpResponse::exit();
}

$controller = new DatabaseController($request);
$result = $controller->execute();
HttpResponse::send(["data" => $result]);

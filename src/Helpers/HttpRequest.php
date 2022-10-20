<?php namespace Helpers;
class HttpRequest{
public string $method;
public array $route;
/**
* Récupère la méthode (ex : GET, POST, etc ...)
* et les différentes partie de la route sous forme de tableau
* (ex : ["product", 1])
*/
private function __construct()
{
//voir $_SERVER['REQUEST_METHOD'] et $_SERVER["REQUEST_URI"]
}
private static $instance;
/**
* Crée une instance de HttpRequest si $instance est null
* puis retourne cette instance
*/
public static function instance(): HttpRequest
{
//...
return self::$instance;
}
}

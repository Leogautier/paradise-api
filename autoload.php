<?php

class Autoload
{
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoloader'));
    }

    public static function autoloader($class)
    {
        require 'src/' . $class . '.php';
    }
}

Autoload::register();

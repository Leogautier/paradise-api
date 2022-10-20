<?php

require_once 'autoload.php';

use Controllers\DatabaseController;

$request = $_SERVER['REQUEST_METHOD'] . "/" .
    filter_var(trim($_SERVER["REQUEST_URI"], '/'), FILTER_SANITIZE_URL);

$controller = new DatabaseController($request);


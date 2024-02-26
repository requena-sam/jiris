<?php
const BASE_PATH = __DIR__ . "/..";
require BASE_PATH . "/vendor/autoload.php";
require BASE_PATH."/core/helpers/functions.php";
$controller = new \App\Http\Controllers\JiriController();
$controller->index();




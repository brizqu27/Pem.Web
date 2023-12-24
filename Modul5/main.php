<?php

header("Content-Type: application/json; charset=UTF-8");

include "app/Routes/PembelianRoutes.php";


use app\Routes\PembelianRoutes;


// TANGKAP REQUEST METHOD
$method = $_SERVER['REQUEST_METHOD'];
// TANGKAP REQUEST PATH
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// PANGGIL ROUTES
$productRoute = new PembelianRoutes();
$productRoute->handle($method, $path);


<?php

require_once('../controller/OrderController.php');
require_once('../controller/ErrorController.php');

// récupère l'url actuelle
$requestUri = $_SERVER['REQUEST_URI'];

// découpe l'url actuelle pour ne récupérer que la fin
// si l'url demandée est "http://http://localhost/site-ecommerce/public/"

$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/site-ecommerce/public/', '', $uri);
$endUri = trim($endUri, '/');


$orderController = new OrderController();

// en fonction de la valeur de $endUri on charge le bon contrôleur
if ($endUri === "create-order") {
    $orderController->createOrder();
} else if ($endUri === "add-product") {
    $orderController->addProduct();
} else if ($endUri === "shipping-address") {
    $orderController->setShippingAddress();
} else if ($endUri === "pay-order") {
    $orderController->payOrder();
} else {
    $errorController = new ErrorController();
    $errorController->notFound();
}



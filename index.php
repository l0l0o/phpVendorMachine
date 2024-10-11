<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./order/controller/IndexController.php');
require_once('./order/controller/ProcessOrderCreateController.php');
require_once('./order/controller/PayController.php');
require_once('./order/controller/ProcessPaymentController.php');
require_once('./order/controller/ProcessShippingAddressController.php');
require_once('./order/controller/ProcessShippingMethodController.php');
require_once('./order/controller/SetShippingAddressController.php');
require_once('./order/controller/SetShippingMethodController.php');

require_once('./product/controller/AddProductController.php');
require_once('./product/controller/CreateProductController.php');
require_once('./product/controller/ShowProductController.php');
require_once('./product/controller/DeleteProductController.php');

// Récupère l'url actuelle et supprime le chemin de base
// c'est à dire : http://localhost:8888/esd-oop-php/public/
// donc cela ne garde que la fin de l'url

$requestUri = $_SERVER['REQUEST_URI'];
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/esd-oop-php/', '', $uri);
$endUri = trim($endUri, '/');


if($endUri === "") {
    $indexController = new IndexController();
    $indexController->index();
    return;
} 

if($endUri === "create-order") {
    $createOrderController = new CreateOrderController();
    $createOrderController->createOrder();
    return;
}  


if ($endUri === "pay") {
    $payController = new PayController();
    $payController->pay();
    return;
}

if ($endUri === "process-payment") {
    $ProcessPaymentController = new ProcessPaymentController();
    $ProcessPaymentController->processPayment();
    return;
}

if ($endUri === "process-shipping-address") {
    $ProcessShippingAddressController = new ProcessShippingAddressController();
    $ProcessShippingAddressController->processShippingAddress();
    return;
}

if ($endUri === "process-shipping-method") {
    $ProcessShippingMethodController = new ProcessShippingMethodController();
    $ProcessShippingMethodController->processShippingMethod();
    return;
}

if ($endUri === "set-shipping-address") {
    $SetShippingAddressController = new SetShippingAddressController();
    $SetShippingAddressController->setShippingAddress();
    return;
}

if ($endUri === "set-shipping-method") {
    $SetShippingMethodController = new SetShippingMethodController();
    $SetShippingMethodController->setShippingMethod();
    return;
}

if ($endUri === "add-product") {
    $addProduct = new AddProductController();
    $addProduct->AddProduct();
    return;
}

if ($endUri === "create-product") {
    $createProduct = new CreateProductController();
    $createProduct->createProduct();
    return;
}

if ($endUri === "show-product") {
    $showProduct = new ShowProductController();
    $showProduct->showProducts();
    return;
}

if ($endUri === "delete-product") {
    $deleteProduct = new DeleteProductController();
    $deleteProduct->deleteProduct();
    return;
}
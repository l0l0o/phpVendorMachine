<?php

require_once '../model/Order.php'; 

session_start();
$shippingAddress = $_POST['shippingAddress'];
$shippingCity = $_POST['shippingCity'];
$shippingCountry = $_POST['shippingCountry'];

try {

    if (isset($_SESSION['order'])) {
        $order = $_SESSION['order'];
        $order->chooseLocationAdress($shippingAddress, $shippingCity, $shippingCountry);
        
    } else {
        echo "Aucune commande en cours.";
    }
} catch (Exception $e) {

	require_once '../view/order-error.php';
}
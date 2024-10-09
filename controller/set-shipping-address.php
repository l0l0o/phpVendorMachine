<?php

require_once '../model/Order.php'; 

session_start();

try {
    
    if (isset($_SESSION['order'])) {
        $shippingAddress = $_POST['shippingAddress'];
        $shippingCity = $_POST['shippingCity'];
        $shippingCountry = $_POST['shippingCountry'];
        $order = $_SESSION['order'];
        $order->chooseLocationAdress($shippingAddress, $shippingCity, $shippingCountry);
        
    } else {
        echo "Aucune commande en cours.";
    }
} catch (Exception $e) {
	require_once '../view/order-error.php';
}
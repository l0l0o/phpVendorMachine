<?php

require_once '../model/Order.php';

session_start();

try {
	isThereProduct($_POST['products']);
	$customerName = $_POST['customerName'];
	$products = $_POST['products'];

	$order = new Order($customerName, $products);

	$_SESSION['order'] = $order;

	persistOrder($order);

	require_once '../view/order-created.php';

} catch (Exception $e) {

	require_once '../view/order-error.php';
}

function persistOrder(Order $order) {
	$_SESSION['order'] = $order;
}

function isThereProduct($productList) {
	if (!is_array($productList) || count($productList) < 1 || $productList === NULL) {
		throw new Exception('Votre panier est vide !');
	}
}
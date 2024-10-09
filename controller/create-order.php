<?php

require_once '../model/Order.php';

session_start();

try {
	if (!is_array($_POST['products']) || count($_POST['products']) < 1 || $_POST['products'] === NULL) {
		throw new Exception('Votre panier est vide !');
	}
	$customerName = $_POST['customerName'];
	$products = $_POST['products'];

	$order = new Order($customerName, $products);

	$_SESSION['order'] = $order;

	require_once '../view/order-created.php';

} catch (Exception $e) {

	require_once '../view/order-error.php';
}
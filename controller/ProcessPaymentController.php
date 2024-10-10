<?php

require_once './model/entity/Order.php'; 
require_once './model/repository/OrderRepository.php';

class ProcessPaymentController
{
	public function processPayment()
	{

		$orderRepository = new OrderRepository();
		$order = $orderRepository->find();

		if (!$order) {
			require_once './view/404.php';
			return;
		}

		try {

			$order->pay();
			$orderRepository->persist($order);
			require_once './view/paid.php';

		} catch (Exception $e) {
			$errorMessage = $e->getMessage();
			require_once './view/order-error.php';
		}
	}
}

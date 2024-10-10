<?php

require_once './model/entity/Order.php';
require_once './model/repository/OrderRepository.php';


class CreateOrderController {

	public function createOrder() {
		try {

			if (!isset($_POST['customerName']) || !isset($_POST['products'])) {
				$errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";
				
				require_once './view/order-error.php';
				return;
			}

			$customerName = $_POST['customerName'];
			$products = $_POST['products'];

			$order = new Order($customerName, $products);

			$orderRepository = new OrderRepository();
			$orderRepository->persist($order);

			require_once './view/order-created.php';

		} catch (Exception $e) {
			$errorMessage = $e->getMessage();
			require_once './view/order-error.php';
		}


	}


}


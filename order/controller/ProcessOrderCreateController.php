<?php

require_once './order/model/entity/Order.php';
require_once './order/model/repository/OrderRepository.php';

require_once './product/model/entity/Product.php';
require_once './product/model/repository/ProductRepository.php';

class CreateOrderController {

	public function createOrder() {
		try {
			if (!isset($_POST['customerName']) || !isset($_POST['productsId'])) {
				$errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";
				
				require_once './order/view/order-error.php';
				return;
			}

			$customerName = $_POST['customerName'];
			// Récuperer l'ID du/des produit(s) dans un tableau
			$productsIds = $_POST['productsId'];
			
			// Récupérer tous les produits enregistrés
			$productRepository = new ProductRepository;
			$allProducts = $productRepository->getAllProducts();
			
			// Récupérer uniquement les produits avec un ID correspondant
			$productsToOrder = $productRepository->findIds($productsIds, $allProducts);

			// Push les produits dans OrderRepository
			$order = new Order($customerName, $productsToOrder);
			$orderRepository = new OrderRepository();
			$orderRepository->persist($order);

			require_once './order/view/order-created.php';

		} catch (Exception $e) {
			$errorMessage = $e->getMessage();
			require_once './order/view/order-error.php';
		}


	}


}


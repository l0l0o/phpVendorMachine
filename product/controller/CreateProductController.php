<?php

require_once './product/model/entity/Product.php';
require_once './product/model/repository/ProductRepository.php';


class CreateProductController {

	public function createProduct() {
		try {  
            if (!isset($_POST['ProductTitle'])) {
                $errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";
				
				require_once './product/view/product-error.php';
				return;
			}

			if (!isset($_POST['ProductIsActive'])) {
				$_POST['ProductIsActive'] = false;
			}

			if (!is_numeric($_POST['ProductPrice'])) {
				$_POST['ProductPrice'] = null;
			}
            
			$ProductTitle = $_POST['ProductTitle'];
			$ProductPrice = $_POST['ProductPrice'];
			$ProductDescription = $_POST['ProductDescription'];
            $ProductIsActive = $_POST['ProductIsActive'];
            
			$product = new Product($ProductTitle, $ProductPrice, $ProductDescription, $ProductIsActive);
            

			$productRepository = new ProductRepository();
			$productRepository->persist($product);

			require_once './product/view/product-created.php';

		} catch (Exception $e) {
			$errorMessage = $e->getMessage();
			require_once './product/view/product-error.php';
		}


	}


}
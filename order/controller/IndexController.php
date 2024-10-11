<?php
require_once './product/model/entity/Product.php';
require_once './product/model/repository/ProductRepository.php';

class IndexController {

	public function index() {

		$allProducts = new ProductRepository;
		$products = $allProducts->getAllProducts();

		require_once('./order/view/home.php');
	}
}




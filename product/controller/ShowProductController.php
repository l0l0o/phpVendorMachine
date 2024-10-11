<?php
require_once './product/model/entity/Product.php';
require_once './product/model/repository/ProductRepository.php';


class ShowProductController {
    
    public function showProducts(){
        $productRepository = new ProductRepository;
        $products = $productRepository->getAllProducts();
        
        require_once './product/view/showProducts.php';
    }
}
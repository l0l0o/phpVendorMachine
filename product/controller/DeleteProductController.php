<?php
require_once './product/model/entity/Product.php';
require_once './product/model/repository/ProductRepository.php';


class DeleteProductController {
    
    public function deleteProduct(){
        $productToDeleteId = $_GET['id'];
        $productToDeleteTitle = $_GET['title'];
        $productRepository = new ProductRepository;
        $productRepository->deleteProduct($productToDeleteId);

        
        require_once './product/view/product-deleted.php';
    }
}
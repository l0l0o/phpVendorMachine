<?php 
require_once './product/model/entity/Product.php';

class ProductRepository {

    // permet d'initialiser la session 
    // à chaque fois qu'on instancie la classe ProductRepository

    // sans l'initialisation de la session, on ne peut pas
    // utiliser correctement la session ($_SESSION)
    public function __construct() {
        session_start();
    }

    public function persist(Product $product): ?Product {
        if(!isset($_SESSION['products'])){
            $_SESSION['products'] = [];
        }

        array_push($_SESSION['products'], $product);

        return $product;
    }

    public function getAllProducts() {
        if(!isset($_SESSION['products'])) {
            return [];
        }

        return $_SESSION['products'];
    }

    public function deleteProduct($id) {
        $allProducts = $this->getAllProducts();
        
        // Filtrer le tableau pour exclure l'objet avec le titre spécifié
        $allProducts = array_filter($allProducts, function($products) use ($id) {
            return $products->getId() !== $id;
        });

        // Réindexer le tableau (optionnel)
        array_values($allProducts);
    }

    public function findIds(array $productsId, array $array): array {
        $productsToAdd = [];
        foreach ($productsId as $productId) {
            $productsToAdd[] = array_filter($array, function($product) use($productId) {
                return $product->getId() === (int) $productId;
            });
        }
        return $productsToAdd;
    }

}
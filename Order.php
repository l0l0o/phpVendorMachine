<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Order {
    private array $Products;
    private float $TotalPrice;
    private string $Id;
    private ?string $ShippingMethod;
    private ?string $ShippingAddress;
    private string $CustomerName;
    private DateTime $CreatedAt;    
    private string $Status;

    public function __construct(string $CustomerName, array $productList)
    {
        if ($CustomerName == 'David Robert') {
            throw new Error('Le vol n\'est pas la solution.');
        }
        if (count($productList)>5){
            throw new Error('Je sais que c\'est surprenant mais on ne peut pas gérer de commandes de plus de 5 produits.');
        }
        $this->Status = "CART";
        $this->CreatedAt = new DateTime();
        $this->Id = rand();

        $this->Products = $productList;
        $this->CustomerName = $CustomerName;
        $this->TotalPrice = count($productList)*5;

        echo "Commande {$this->Id} créée, d'un montant de {$this->TotalPrice} !";    
    }
}

$order = new Order('David Robert', ['Sac', 'Trousseau de clé']);
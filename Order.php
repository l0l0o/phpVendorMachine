<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Order {
    private array $Products;
    private float $TotalPrice;
    private string $Id;
    private ?string $ShippingMethod;
    private ?string $ShippingCity;
    private ?string $ShippingAddress;
    private ?string $ShippingCountry;
    private array $AuthorizedCountries;
    
    
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
        $this->AuthorizedCountries = ["FRANCE", "BELGIQUE", "LUXEMBOURG"];

        echo nl2br("<p>Bonjour {$this->CustomerName} !<br>Commande {$this->Id} créée.<br>Panier : {$this->TotalPrice} €.<br></p>");    
    }

    public function addProduct(string $productName) {
        if ($this->Status != 'CART') {
            throw new Error("Vous ne pouvez pas passer de commande pour le moment<br>.");
        }

        if ((array_search($productName, $this->Products)) == true) {
            throw new Error("Le produit : {$productName} est déjà dans votre panier.<br>");
        }

        array_push($this->Products, "{$productName}");
        $this->TotalPrice = count($this->Products)*5;

        echo "Votre panier contient :<br>";

        for ($i = 0; $i < count($this->Products); $i++) {
            echo $this->Products[$i];
            if ($i !== count($this->Products) -1){
                echo ", ";
            }
        }
        echo "<br>";

        echo "Panier : {$this->TotalPrice} €.<br><br>";
    }

    public function deleteProduct(string $productName) {
        if (($key = array_search($productName, $this->Products)) !== false) {
            unset($this->Products[$key]);
        }    
        $ProductsAsString = implode(', ', $this->Products);
        echo "Liste des produits : {$ProductsAsString}<br><br>";
    }

    public function chooseLocationAdress($city, $adress, $country) {
        if ($this->Status != 'CART') {
            throw new Error("Vous ne pouvez pas passer de commande pour le moment<br>.");
        }
        if ((array_search($country, $this->AuthorizedCountries)) === false) {
            throw new Error("Désolé, nos produits sont seulement disponibles en France, en Belgique et au Luxembourg.<br>");
        }
        $ShippingCity = "$city";
        $ShippingAddress = "$adress";
        $ShippingCountry = "$country";
        echo "Adresse de livraison : {$ShippingAddress}, {$ShippingCity}, {$ShippingCountry}<br><br>";
        }

    public function chooseShippingMethod($shippingMethod) {
        if($shippingMethod ==! 'CHRONOPOST' || $shippingMethod ==! 'Point Relais' || $shippingMethod ==! 'Domicile'){
            throw new Error('Veuillez choisir une méthode de livraison.<br><br>');
        }
        if($this->ShippingAddress === NULL) {
            throw new Error("Veuillez renseigner votre adresse.<br><br>");
        }
        $this->ShippingMethod = $shippingMethod;
        echo "Méthode de livraison : {$this->ShippingMethod}<br>";

        if ($this->ShippingMethod === 'CHRONOPOST') {
            $this->TotalPrice += 5;
            echo "Frais de livraison CHRONOPOST: 5 EUROS<br>{$this->TotalPrice}<br><br>";
        }
    }

    public function payOrder($amount) {
        if($this->ShippingAddress === NULL) {
            throw new Error("Veuillez renseigner votre adresse.<br><br>");
        }
        if ($amount<$this->TotalPrice) {
            throw new Error("Votre paiement a été refusé.");
        }
        echo "Paiement réussi ! Votre commande est en cours de préparation.";
    }

}
try {
    $order = new Order('Stéphanie Lampard', ['Sac', 'Trousseau de clé']);
    $order->addProduct('Lampe de poche');
    $order->deleteProduct('toto');
    $order->chooseLocationAdress('5 rue pierrot', 'Bordeaux','FRANCE');
    $order->chooseShippingMethod('CHRONOPOST');
    $order->payOrder('50');

} catch(Error $error) {
    echo $error->getMessage();
}

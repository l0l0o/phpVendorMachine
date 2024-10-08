<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Order {
	public static $CART_STATUS = "CART";
	public static $SHIPPING_ADDRESS_SET_STATUS = "SHIPPING_ADDRESS_SET";
	public static $SHIPPING_METHOD_SET_STATUS = "SHIPPING_METHOD_SET";
	public static $PAID_STATUS = "PAID";
	public static $MAX_PRODUCTS_BY_ORDER = 5;
	public static $BLACKLISTED_CUSTOMERS = ['David Robert'];
	public static $UNIQUE_PRODUCT_PRICE = 5;
	public static $AUTORIZED_SHIPPING_COUNTRIES = ['France', 'Belgique', 'Luxembourg'];
	public static $AVAILABLE_SHIPPING_METHODS = ['Chronopost Express', 'Point relais', 'Domicile'];
	public static $PAID_SHIPPING_METHOD = 'Chronopost Express';

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
        if (array_search("$CustomerName", Order::$BLACKLISTED_CUSTOMERS )) {
            throw new Error('Le vol n\'est pas la solution.');
        }
        if (count($productList)> Order::$MAX_PRODUCTS_BY_ORDER){
            throw new Error('Je sais que c\'est surprenant mais on ne peut pas gérer de commandes de plus de 5 produits.');
        }
        $this->Status = Order::$CART_STATUS;
        $this->CreatedAt = new DateTime();
        $this->Id = rand();

        $this->Products = $productList;
        $this->CustomerName = $CustomerName;
        $this->TotalPrice = count($productList)*Order::$UNIQUE_PRODUCT_PRICE;

        echo nl2br("<p>Bonjour {$this->CustomerName} !<br>Commande {$this->Id} créée.<br>Panier : {$this->TotalPrice} €.<br></p>");    
    }

    private function calculateTotalCart(): int {
        return count($this->Products) * Order::$UNIQUE_PRODUCT_PRICE;
    }

    public function addProduct(string $productName) {
        if ($this->Status != Order::$CART_STATUS) {
            throw new Error("Vous ne pouvez pas passer de commande pour le moment<br>.");
        }

        if ((array_search($productName, $this->Products)) == true) {
            throw new Error("Le produit : {$productName} est déjà dans votre panier.<br>");
        }

        array_push($this->Products, "{$productName}");
        $this->TotalPrice = $this->calculateTotalCart();

        echo "Votre panier contient :<br>";

        for ($i = 0; $i < count($this->Products); $i++) {
            echo $this->Products[$i];
            if ($i !== count($this->Products) - 1){
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
        $this->TotalPrice = $this->calculateTotalCart();

        echo "Liste des produits : {$ProductsAsString}<br><br>";
    }

    public function chooseLocationAdress($city, $address, $country) {
        if ($this->Status != Order::$CART_STATUS) {
            throw new Error("Vous ne pouvez pas passer de commande pour le moment<br>.");
        }
        if ((array_search($country, Order::$AUTORIZED_SHIPPING_COUNTRIES)) === false) {
            throw new Error("Désolé, nos produits sont seulement disponibles en France, en Belgique et au Luxembourg.<br>");
        }
        $ShippingCity = "$city";
        $ShippingAddress = "$address";
        $ShippingCountry = "$country";
        $this->Status = "SHIPPING_ADRESS_SET";
        echo "Adresse de livraison : {$ShippingAddress}, {$ShippingCity}, {$ShippingCountry}<br><br>";
        }

    public function chooseShippingMethod($shippingMethod) {
        if(!in_array($shippingMethod, Order::$AVAILABLE_SHIPPING_METHODS)){
            throw new Error('Veuillez choisir une méthode de livraison.<br><br>');
        }
        if($this->ShippingAddress == NULL) {
            throw new Error("Veuillez renseigner votre adresse.<br><br>");
        }
        $this->ShippingMethod = $shippingMethod;
        echo "Méthode de livraison : {$this->ShippingMethod}<br>";

        if ($this->ShippingMethod === order::$PAID_SHIPPING_METHOD ) {
            $this->TotalPrice += Order::$UNIQUE_PRODUCT_PRICE;
            echo "Frais de livraison CHRONOPOST: 5 EUROS<br>{$this->TotalPrice}<br><br>";
        }
    }

    public function payOrder($amount) {
        if($this->ShippingAddress == NULL) {
            throw new Error("Veuillez renseigner votre adresse.<br><br>");
        }
        if ($amount<$this->TotalPrice) {
            throw new Error("Votre paiement a été refusé.");
        }
        echo "Paiement réussi ! Votre commande est en cours de préparation.";
    }
}


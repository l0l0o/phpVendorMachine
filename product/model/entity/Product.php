<?php 

class Product {
    public static int $ITEM_PRICE_DEFAULT = 2;
    public static int $ITEM_PRICE_MIN = 1;
    public static int $ITEM_PRICE_MAX = 500;

    private int $Id;
    private string $Title;
    private int $Price;
    private ?string $Description;
    private bool $IsActive;

    public function getTitle() {
        return $this->Title;
    }
    public function setTitle(string $title) {
        $this->Title = $title;
    }

    public function getPrice() {
        return $this->Title;
    }
    public function setPrice(string $price) {
        $this->Price = $price;
    }

    public function getDescription() {
        return $this->Description;
    }
    public function setDescription(string $description) {
        $this->Description = $description;
    }

    public function getId() {
        return $this->Id;
    }


    public function __construct(string $title, int $price, string $description, bool $active)
    {
        if(!$this->isTitleValid($title)) {
			throw new Exception(message: 'Le titre doit faire au moins 2 caractères.');
        }

        if($price === null || $price === ""){
            $price = Product::$ITEM_PRICE_DEFAULT;
        }
        
        if($price < Product::$ITEM_PRICE_MIN || $price > Product::$ITEM_PRICE_MAX) {
            throw new Exception(message: 'Le prix doit être compris entre 1€ et 500€.');
        }
        
        if($active === null) {
            $active = false;
        }
        
        $this->Id = rand();
        $this->Title = $title;
        $this->Price = $price;
        $this->Description = $description;
        $this->IsActive = $active;
    }

    private function isTitleValid($testString): bool {
        $pattern = '/^.{2,}$/';
        
        if (preg_match($pattern, $testString)) {
            return true;
        }
        return false;
    }
}
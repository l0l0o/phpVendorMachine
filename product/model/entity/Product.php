<?php 

class Product {
    public static int $ITEM_PRICE_DEFAULT = 2;
    public static int $ITEM_PRICE_MIN = 1;
    public static int $ITEM_PRICE_MAX = 500;    
    public static int $ITEM_TITLE_MIN = 3;
    public static int $ITEM_TITLE_MAX = 100;

    private int $Id;
    private string $Title;
    private int $Price;
    private ?string $Description;
    private bool $IsActive;

    public function getId() {
        return $this->Id;
    }

    public function getTitle() {
        return $this->Title;
    }
    public function setTitle(string $title) {
        $this->Title = $title;
    }

    public function getPrice() {
        return $this->Price;
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

    public function getIsActive() {
        return $this->IsActive;
    }



    public function __construct(string $title, ?int $price, string $description, bool $active)
    {
        if(!$this->isTitleValid($title)) {
			throw new Exception(message: 'Le titre doit faire entre 3 et 100 caractères.');
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

    private function isTitleValid($title): bool {
        $pattern = '/^.{3,100}$/';

        if (preg_match($pattern, $title)) {
            return true;
        }
        return false;
    }
}
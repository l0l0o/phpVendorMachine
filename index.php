<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class vendorMachine {
    private bool $isOn;
    private int $snackQty;
    private int $snackPrice;
    private int $money;

    public function __construct()
    {
        $this -> isOn = false;
        $this -> snackQty = 50;
        $this -> snackPrice = 2;
        $this -> money = 0;
    }

    public function buySnack(): void {
        $this -> isOn = true;
        if ($this->snackQty < 1) {
            throw new Error ("La machine est vide.");
        }
        $this -> money = $this->money + $this->snackPrice;
        $this -> snackQty--;
    }

    public function reset(): void {
        $this -> snackQty = $this->calculateLeftSnacksQty();
        $this -> money = 0;
        $this -> isOn = true;
    }

    private function calculateLeftSnacksQty() {
        return $this -> snackQty + (50 - $this->snackQty);
    }

    public function shootWithFoot() {
        $this -> isOn = false;
        $snackToTake = $this -> dropSnack();
        $moneyToTake = $this -> dropMoney();
        return "Vous avez chaparder $snackToTake snacks et $moneyToTake euros.";
    }

    private function dropSnack() {
        $dropSnack = 5;
        if ($this->snackQty < 5) {
            $this->$dropSnack = $this->snackQty;
            $this->snackQty -= $this->$dropSnack;    
        }
        $this->money -= 20;
        return $dropSnack;
    }  
    
    private function dropMoney() {
        $dropMoney = 20;
        if ($this->money < 20) {
            $this->$dropMoney = $this->money;
            $this->money -= $this->$dropMoney;    
        }
        $this->money -= 20;
        return $dropMoney;
    }
}

$vendorMachine = new vendorMachine();

var_dump($vendorMachine->shootWithFoot());
?>

<?php 
require_once './order/model/entity/Order.php';

class OrderRepository {

    // permet d'initialiser la session 
    // à chaque fois qu'on instancie la classe OrderRepository

    // sans l'initialisation de la session, on ne peut pas
    // utiliser correctement la session ($_SESSION)
    public function __construct() {
        session_start();
    }

    public function persist(Order $order): ?Order {
        $_SESSION['order'] = $order;
        return $order;
    }

    public function find() {
        if(!isset($_SESSION['order'])) {
            return null;
        }

        return $_SESSION['order'];
    }

}
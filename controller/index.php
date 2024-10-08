<?php

require_once "../model/Order.php";


try {
    $order = new Order('Jean Stéphane', ['Sac','Polo','Chemise']);
    echo '<html><body>Commande créée.<body><html>';
    require_once '../view/order-created.php';
} catch (Exception $e) {
    echo "<html><body><p>" . $e->getMessage() . "</p></body></html>";
    require_once '../view/order-error.php';
}
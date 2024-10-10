<?php

require_once './model/entity/Order.php'; 
require_once './model/repository/OrderRepository.php';

class ProcessShippingMethodController
{
    public function processShippingMethod()
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './view/404.php';
            return;
        }

        try {
            $order = $_SESSION['order'];

            if (!isset($_POST['shippingMethod'])) {
                $errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";
                
                require_once './view/order-error.php';
                return;
            }

            $shippingMethod = $_POST['shippingMethod'];
          
            $order->setShippingMethod($shippingMethod);

            $orderRepository->persist($order);

            require_once './view/shipping-method-added.php';

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './view/order-error.php';
        }
    }
}

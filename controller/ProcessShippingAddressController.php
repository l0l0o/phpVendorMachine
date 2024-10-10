<?php

require_once './model/entity/Order.php'; 
require_once './model/repository/OrderRepository.php';

class ProcessShippingAddressController
{
    public function processShippingAddress()
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './view/404.php';
            return;
        }

        try {
            $order = $_SESSION['order'];

            if (!isset($_POST['shippingCountry']) || 
                !isset($_POST['shippingCity']) || 
                !isset($_POST['shippingAddress'])
            ) {
                $errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";
                
                require_once './view/order-error.php';
                return;
            }

            $shippingCountry = $_POST['shippingCountry'];
            $shippingCity = $_POST['shippingCity'];
            $shippingAddress = $_POST['shippingAddress'];

            $order->setShippingAddress($shippingAddress, $shippingCity, $shippingCountry);

            $orderRepository->persist($order);


            require_once './view/shipping-address-added.php';

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './view/order-error.php';
        }
    }
}


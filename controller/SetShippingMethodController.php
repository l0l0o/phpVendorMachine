<?php
require_once './model/repository/OrderRepository.php';

class SetShippingMethodController
{
    public function setShippingMethod()
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './view/404.php';
            return;
        }

        require_once './view/set-shipping-method.php';
    }
}

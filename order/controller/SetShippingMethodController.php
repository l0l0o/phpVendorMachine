<?php
require_once './order/model/repository/OrderRepository.php';

class SetShippingMethodController
{
    public function setShippingMethod()
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './order/view/404.php';
            return;
        }

        require_once './order/view/set-shipping-method.php';
    }
}

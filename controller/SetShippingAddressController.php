<?php
require_once './model/repository/OrderRepository.php';


class SetShippingAddressController
{
    public function setShippingAddress()
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './view/404.php';
            return;
        }

        require_once './view/set-shipping-address.php';
    }
}

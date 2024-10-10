<?php

require_once './model/repository/OrderRepository.php';

class PayController
{
    public function pay()
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './view/404.php';
            return;
        }

        require_once './view/pay.php';
    }
}

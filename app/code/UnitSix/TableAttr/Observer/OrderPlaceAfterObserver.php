<?php

namespace UnitSix\TableAttr\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class OrderPlaceAfterObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $orderPlaced = '';
        $order = $observer->getEvent()->getOrder();
        $orderPlaced = $order->getRemoteIp();
        if (!$orderPlaced) {
            $order->setData('require_verification', 0);
        } else {
            $order->setData('require_verification', 1);
        }
        return $order;
    }
}
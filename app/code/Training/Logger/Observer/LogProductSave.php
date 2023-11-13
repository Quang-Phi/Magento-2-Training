<?php

namespace Training\Logger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogProductSave implements ObserverInterface
{
    protected $logger;

    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getProduct();
        $productId = $product->getId();
        $origData = $product->getOrigData();
        $changes = [];

        if (!empty($origData)) {
            foreach ($product->getData() as $key => $value) {
                if (array_key_exists($key, $origData) && $value != $origData[$key]) {
                    $changes[$key] = [
                        'old_value' => $origData[$key],
                        'new_value' => $value,
                    ];
                }
            }
        }

        if (!empty($changes)) {
            $this->logger->info("Product ID: $productId - Data changes: " . json_encode($changes));
        }
    }
}

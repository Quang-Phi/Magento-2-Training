<?php
namespace Custom\Logger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LayoutGenerateBlocksAfterObserver implements ObserverInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $layout = $observer->getEvent()->getLayout();
        $update = $layout->getUpdate();
        $handle = $update->getHandles();
        if (in_array('catalog_product_view', $handle)) {
            $xml = $layout->getXmlString();
            $this->logger->info($xml);
        }
    }
}

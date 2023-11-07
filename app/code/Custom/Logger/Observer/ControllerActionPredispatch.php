<?php
namespace Custom\Logger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class ControllerActionPredispatch implements ObserverInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $request = $observer->getEvent()->getRequest();
        $url = $request->getPathInfo();
        $this->logger->info($url);
    }
}

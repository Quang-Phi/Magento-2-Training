<?php
namespace Custom\GetHtml\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class CapturePageOutput implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $response = $observer->getEvent()->getData('response');
        $content = $response->getBody();

        $logPath = '/var/log/page_output.log'; 
        file_put_contents(BP . $logPath, $content, FILE_APPEND);
    }
}

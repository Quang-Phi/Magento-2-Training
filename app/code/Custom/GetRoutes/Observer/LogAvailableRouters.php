<?php
namespace Custom\GetRoutes\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\App\RouterList;

class LogAvailableRouters implements ObserverInterface
{
    protected $routerList;

    public function __construct(RouterList $routerList)
    {
        $this->routerList = $routerList;
    }

    public function execute(Observer $observer)
    {
        $routers = $this->getAvailableRouters();

        $logPath = '/var/log/available_routers.log'; 
        file_put_contents(BP . $logPath, implode("\n", $routers), FILE_APPEND);
    }

    protected function getAvailableRouters()
    {
        $routers = [];
        foreach ($this->routerList as $router) {
            $routers[] = get_class($router);
        }
        return $routers;
    }
}

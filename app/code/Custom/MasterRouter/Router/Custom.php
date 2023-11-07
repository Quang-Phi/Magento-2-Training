<?php

namespace Custom\MasterRouter\Router;


class Custom implements \Magento\Framework\App\RouterInterface
{
    protected $actionFactory;

    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
    )
    {
        $this->actionFactory = $actionFactory;
    }

    public function match(\Magento\Framework\App\RequestInterface $request)
{
    $identifier = trim($request->getPathInfo(), '/');
    $router = "custom-test-myview";
    
    if ($identifier == $router) {
        $request->setModuleName('custom')
                ->setControllerName('test')
                ->setActionName('myview')
                ->setPathInfo('/custom/test/myview');
        return $this->actionFactory->create('Magento\Framework\App\Action\Forward');
    }

    return null;
}
}
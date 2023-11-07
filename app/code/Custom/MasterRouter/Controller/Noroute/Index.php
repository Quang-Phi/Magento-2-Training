<?php

namespace Custom\MasterRouter\Controller\Noroute;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\ForwardFactory;

class Index extends Action
{
    /**
     * @var ForwardFactory
     */
    protected $forwardFactory;

    /**
     * @param Context $context
     * @param ForwardFactory $forwardFactory
     */
    public function __construct(
        Context $context,
        ForwardFactory $forwardFactory
    ) {
        $this->forwardFactory = $forwardFactory;
        parent::__construct($context);
    }

    /**
     * Forward to the home page
     *
     * @return ResponseInterface
     */
    public function execute()
    {
        $resultForward = $this->forwardFactory->create();
        $resultForward->setController('index')
            ->setModule('cms')
            ->forward('index');

        return $resultForward;
    }
}
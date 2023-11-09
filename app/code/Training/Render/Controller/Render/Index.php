<?php

namespace Training\Render\Controller\Render;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    protected $resultPageFactory = false;
    protected $customBlock;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}

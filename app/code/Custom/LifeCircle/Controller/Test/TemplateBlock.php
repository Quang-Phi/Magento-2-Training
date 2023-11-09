<?php

namespace Custom\LifeCircle\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class TemplateBlock extends Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Template Block Page'));
        $resultPage->getLayout()
            ->createBlock(\Custom\LifeCircle\Block\CustomTemplateBlock::class)
            ->setTemplate('Custom_LifeCircle::custom_template.phtml')
            ->toHtml();
        
        return $resultPage;
    }
}
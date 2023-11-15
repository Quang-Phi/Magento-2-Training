<?php

namespace Training\Block\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__(' Extra Block Page'));
        $cmsBlock = $resultPage->getLayout()->createBlock(
            \Magento\Cms\Block\Block::class
        )->setBlockId('home-slider');

        $resultPage->getLayout()->setChild('content', $cmsBlock->getNameInLayout(), $cmsBlock); 
        return $resultPage;
    }
}
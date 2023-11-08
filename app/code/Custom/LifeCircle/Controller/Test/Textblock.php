<?php

namespace Custom\LifeCircle\Controller\Test;

use Magento\Framework\App\Action\Action;

class TextBlock extends Action
{
    protected $resultPageFactory = false;

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
        $resultPage->getConfig()->getTitle()->prepend(__(' heading '));

        $block =  $resultPage->getLayout()
        ->createBlock(\Magento\Framework\View\Element\Template::class)
        ->setTemplate('Custom_LifeCircle::test.phtml');

        $resultPage->getLayout()->setChild('content', $block->getNameInLayout(), $block); 

        return $resultPage;
        }
}

<?php

namespace UnitSix\Game\Controller\Adminhtml\Create;

class Add extends \Magento\Backend\App\Action {
    protected $resultPageFactory = false;
        public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\View\Result\PageFactory $resultPageFactory
        )
        {
            parent::__construct($context);
            $this->resultPageFactory = $resultPageFactory;
        }
        public function execute()
        {
            $resultPage = $this->resultPageFactory->create();
            $resultPage->getConfig()->getTitle()->prepend((__('My Page')));
            $resultPage->setActiveMenu('UnitSix_Game::menu');
            return $resultPage;
        }

        public function _isAllowed()
        {
            return $this->_authorization->isAllowed('UnitSix_Game::menu');
        }
    }

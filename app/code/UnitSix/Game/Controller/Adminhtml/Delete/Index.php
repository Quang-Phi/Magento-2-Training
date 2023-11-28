<?php

namespace UnitSix\Game\Controller\Adminhtml\Delete;

use Magento\Backend\App\Action\Context;
use UnitSix\Game\Model\ResourceModel\Game\GameCollectionFactory;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    protected $gameCollectionFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        GameCollectionFactory $gameCollectionFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->gameCollectionFactory = $gameCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $gameIds = $this->getRequest()->getParam('selected');
        if (!empty($gameIds)) {
            try {
                $gameCollection = $this->gameCollectionFactory->create();
                $gameCollection->addFieldToFilter('game_id', ['in' => $gameIds]);
                foreach ($gameCollection as $gameModel) {
                    $gameModel->delete();
                }
                $this->messageManager->addSuccessMessage(__('Selected data have been deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        } else {
            $this->messageManager->addErrorMessage(__('No games selected.'));
        }
        return $this->resultRedirectFactory->create()->setPath('customadmin/create/index');
    }
}
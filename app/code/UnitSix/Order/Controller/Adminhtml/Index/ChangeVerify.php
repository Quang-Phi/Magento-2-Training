<?php

namespace UnitSix\Order\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class ChangeVerify extends Action
{

    protected $orderCollectionFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory
    ) {
        parent::__construct($context);
        $this->orderCollectionFactory = $orderCollectionFactory;
    }
  
    public function execute()
    {
        $orderIds = $this->getRequest()->getParam('selected');
        $collection = $this->getVerifiedOrders($orderIds);

        foreach ($collection as $order) {
            $order->setRequireVerification(0);
            $order->save();
        }
        $this->messageManager->addSuccess(__('Verify of order ID ' . implode(',', $orderIds) . ' has been changed successfully.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('sales/order/index');
    }

    protected function getVerifiedOrders($orderIds)
    {
        $collection = $this->orderCollectionFactory->create();
        $collection->addFieldToFilter('entity_id', ['in' => $orderIds]);
        return $collection;
    }
}
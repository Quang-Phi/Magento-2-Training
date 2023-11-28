<?php
namespace UnitSix\Game\Controller\Adminhtml\Create;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\View\Result\PageFactory;
use UnitSix\Game\Model\ResourceModel\Game\GameCollectionFactory;

class Save extends Action
{
    protected $resultPageFactory;
    protected $gameCollectionFactory;
    protected $formKeyValidator;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        GameCollectionFactory $gameCollectionFactory,
        Validator $formKeyValidator
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->gameCollectionFactory = $gameCollectionFactory;
        $this->formKeyValidator = $formKeyValidator;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPageFactory = $this->resultRedirectFactory->create();
        if (!$this->formKeyValidator->validate($this->getRequest())) {
            $this->messageManager->addErrorMessage(__("Form key is invalid"));
            return $resultPageFactory->setPath('*/*/index');
        }

        $data = $this->getRequest()->getPostValue();
        try {
            if ($data) {
                $releaseDate = date('Y-m-d', strtotime($data['release_date']));
                $data['release_date'] = $releaseDate;
                $model = $this->gameCollectionFactory->create()->getNewEmptyItem();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data saved successfully."));
                return $resultPageFactory->setPath('*/*/index');
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, please try again."));
        }
    }

}

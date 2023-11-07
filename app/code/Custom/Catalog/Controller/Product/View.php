<?php
namespace Custom\Catalog\Controller\Product;

use Magento\Catalog\Controller\Product\View as MagentoView;

class View extends MagentoView
{
    protected $messageManager;
    public function execute()
    {
        $result = parent::execute();
        $message = 'Chào mừng bạn đến với trang chi tiết sản phẩm!';
        $this->messageManager->addSuccessMessage($message);
        return $result;
    }
  
}
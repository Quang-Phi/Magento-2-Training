<?php
namespace Training\Cate\Plugin\Category;

use Magento\Catalog\Model\ResourceModel\Product\Collection as ProductCollection;
use Magento\Framework\App\RequestInterface;

class View
{
    protected $request;
    public function __construct(
        RequestInterface $request
    ) {
        $this->request = $request;
    }
    public function beforeLoad(ProductCollection $subject)
{
    $categoryId = 41;
    $filter = $this->request->getParam('filter');
    $subject->addCategoriesFilter(['eq' => $categoryId]);
    $subject->addAttributeToFilter('name', ['like' => '%' . $filter . '%']);
    
    // echo $subject->getSelect()->__toString();
}

}
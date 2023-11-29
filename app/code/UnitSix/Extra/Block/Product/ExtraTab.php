<?php

namespace UnitSix\Extra\Block\Product;

use Magento\Framework\View\Element\Template;
use UnitSix\Extra\Model\ResourceModel\ExtraProductLink\ExtraCollectionFactory;
use Magento\Framework\Registry; 

class ExtraTab extends Template
{
    protected $extraCollectionFactory;
    protected $coreRegistry;


    public function __construct(
        ExtraCollectionFactory $extraCollectionFactory,
        \Magento\Catalog\Block\Product\Context $context,
        Registry $coreRegistry, 
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->extraCollectionFactory = $extraCollectionFactory;
        $this->coreRegistry = $coreRegistry;
    }

    public function getExtra()
    {
        $product = $this->getCurrentProduct();
        $productId = $product->getId();
    
        $extraCollection = $this->extraCollectionFactory->create();
        $extraCollection->addFieldToFilter('product_id', $productId);
    
        $extraCollection->getSelect()
            ->join(
                ['extra' => $extraCollection->getTable('extra_table')],
                'main_table.extra_id = extra.extra_id',
                ['name'] 
            );
    
        $extraData = $extraCollection->getData();
        return $extraData;
    }

    /**
     * @return \Magento\Catalog\Model\Product
     */
    public function getCurrentProduct()
    {
        return $this->coreRegistry->registry('current_product');
    }
}

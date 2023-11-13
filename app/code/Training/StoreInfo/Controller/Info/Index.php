<?php

namespace Training\StoreInfo\Controller\Info;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Store\Model\ResourceModel\Store\Collection;
use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;


class Index extends Action
{
    protected $storeCollection;
    protected $categoryModel;
    protected $categoryCollectionFactory;


    public function __construct(
        Context $context,
        Collection $storeCollection,
        Category $categoryModel,
        CategoryCollectionFactory $categoryCollectionFactory

    ) {
        parent::__construct($context);
        $this->storeCollection = $storeCollection;
        $this->categoryModel = $categoryModel;
        $this->categoryCollectionFactory = $categoryCollectionFactory;

    }

    public function execute()
    {
        $storeViews = $this->storeCollection->load();

        foreach ($storeViews as $store) {
            $storeId = $store->getId();
            $rootCategoryId = $store->getRootCategoryId();

            $storeViewName = $store->getName();
            $rootCategory = $this->categoryModel->load($rootCategoryId);
            $rootCategoryName = $rootCategory->getName();


            $categoryCollection = $this->categoryCollectionFactory->create();
            $categoryCollection->addAttributeToSelect('name')
                                ->addFieldToFilter('entity_id', $rootCategoryId);

            echo "Store ID: $storeId<br> Store View: $storeViewName<br> Root Category: $rootCategoryName<br> <br>";
            
        }
    }
}

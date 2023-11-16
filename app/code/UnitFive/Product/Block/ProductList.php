<?php

namespace UnitFive\Product\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrderBuilder;

class ProductList extends Template
{
    protected $_productRepository;
    protected $_objectManager;
    protected $_searchCriteriaBuilder;

    public function __construct(
        Template\Context $context,
        ProductRepositoryInterface $productRepository,
        ObjectManagerInterface $objectManager,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_productRepository = $productRepository;
        $this->_objectManager = $objectManager;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
    $this->_sortOrderBuilder = $sortOrderBuilder;

    }

    public function getProductList()
    {
        $products = $this->_productRepository->getList($this->getSearchCriteria())->getItems();
        return $products;
    }

    private function getSearchCriteria()
    {
        $sortOrder = $this->_sortOrderBuilder
            ->setField('entity_id')
            ->setDirection('DESC')
            ->create();

        $builder = $this->_searchCriteriaBuilder
            ->addFilter('discrete_graphics_card', '1')
            ->addFilter('RAM', '223')
            ->setPageSize(6)
            ->addSortOrder($sortOrder)
            ->create();
        return $builder;
    }
}
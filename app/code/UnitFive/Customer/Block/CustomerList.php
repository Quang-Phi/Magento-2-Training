<?php

namespace UnitFive\Customer\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class CustomerList extends Template
{
    protected $_customerRepository;
    protected $_searchCriteriaBuilder;

    public function __construct(
        Context $context,
        CustomerRepositoryInterface $customerRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        $this->_customerRepository = $customerRepository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    public function getCustomerList()
    {
        $customerList = $this->_customerRepository->getList($this->getSearchCriteria());
        $objType = get_class($customerList);
        return [$customerList, $objType];
    }

    private function getSearchCriteria()
    {
        $builder = $this->_searchCriteriaBuilder
            ->addFilter('email', 'roni_cost@example.com')
            ->addFilter('firstname', 'Veronica', 'like')
            ->create();
        return $builder;
    }

 
}

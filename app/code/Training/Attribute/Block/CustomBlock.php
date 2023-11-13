<?php

namespace Training\Attribute\Block;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Config;
use Magento\Framework\View\Element\Template\Context;

class CustomBlock extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context
     * @param array $data
     */

    public function __construct(
        Context $context,
        Config $eavConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->eavConfig = $eavConfig;
    }

    /**
     * @return string
     */
    public function getMyAttribute()
    {
        $options = [];
        $attributes = $this->eavConfig->getAttribute(Product::ENTITY, 'my_attr_select');
        $options = $attributes->getSource()->getAllOptions();

        $attributeValue = '';
        foreach ($options as $option) {
            $attributeValue .= $option['label'] . ',';
        }
        $attributeValue = rtrim($attributeValue, ',');

        return $attributeValue;
    }
}

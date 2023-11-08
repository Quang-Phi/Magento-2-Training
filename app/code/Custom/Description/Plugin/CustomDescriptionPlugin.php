<?php
namespace Custom\Description\Plugin;

class CustomDescriptionPlugin
{
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $subject)
    {
        $customDescription = 'This is a custom product description.';
        $subject->getProduct()->setDescription($customDescription);
    }
}

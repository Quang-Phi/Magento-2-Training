<?php

namespace Custom\LifeCircle\Block;

use Magento\Framework\View\Element\AbstractBlock;

class CustomBlock extends AbstractBlock
{
    protected function _toHtml()
    {
        $html = '<div>Hello from Custom Block!</div>';
        return $html;
    }
}
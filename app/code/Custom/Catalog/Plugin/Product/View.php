<?php

namespace Custom\Catalog\Plugin\Product;

use Magento\Catalog\Block\Product\View as ProductView;

class View
{
    public function afterToHtml(ProductView $subject, $html)
    {
        // $customHtml = '<div class="custom-text">My custom text</div>';
        // $html .= $customHtml;
        return $html;
    }
}

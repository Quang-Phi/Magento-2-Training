<?php
namespace Custom\Footer\Plugin;

class FooterPlugin
{
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        return "Customized copyright!";
    }
}

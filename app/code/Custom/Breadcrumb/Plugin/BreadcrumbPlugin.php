<?php
namespace Custom\Breadcrumb\Plugin;

class BreadcrumbPlugin
{
    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $breadcrumb, $crumbName, $crumbInfo)
    {
       $crumbInfo['label'] = $crumbInfo['label'] . "!";
        return [$crumbName, $crumbInfo];
    }
}

<?php
namespace UnitSix\Extra\Model\ResourceModel\ExtraProductLink;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use UnitSix\Extra\Model\ExtraProductLink;
use UnitSix\Extra\Model\ResourceModel\ExtraProductLink as ExtraProductLinkResource;

class ExtraCollection extends AbstractCollection
{
    protected $_idFieldName = 'link_id';

    protected function _construct()
    {
        $this->_init(
            ExtraProductLink::class,
            ExtraProductLinkResource::class
        );
    }
}
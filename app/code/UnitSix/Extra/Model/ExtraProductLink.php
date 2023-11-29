<?php

namespace UnitSix\Extra\Model;

use Magento\Framework\Model\AbstractModel;

class ExtraProductLink extends AbstractModel
{
    protected $_idFieldName = 'link_id';

    protected function _construct()
    {
        $this->_init('UnitSix\Extra\Model\ResourceModel\ExtraProductLink');
    }
}

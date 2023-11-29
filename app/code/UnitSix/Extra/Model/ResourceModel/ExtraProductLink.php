<?php

namespace UnitSix\Extra\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ExtraProductLink extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('extra_product_link', 'link_id');
    }
}

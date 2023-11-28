<?php

namespace UnitSix\Game\Model;

use Magento\Framework\Model\AbstractModel;

class Game extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('UnitSix\Game\Model\ResourceModel\Game');
    }
    
}

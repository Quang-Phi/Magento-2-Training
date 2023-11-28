<?php
namespace UnitSix\Game\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Game extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('computer_games', 'game_id');
    }
}
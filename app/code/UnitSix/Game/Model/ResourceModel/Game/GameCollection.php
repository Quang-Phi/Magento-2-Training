<?php
namespace UnitSix\Game\Model\ResourceModel\Game;

use UnitSix\Game\Model\Game;
use UnitSix\Game\Model\ResourceModel\Game as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class GameCollection extends AbstractCollection
{
    protected $_idFieldName = 'game_id';

    protected function _construct()
    {
        $this->_init(Game::class, ResourceModel::class);
    }
}

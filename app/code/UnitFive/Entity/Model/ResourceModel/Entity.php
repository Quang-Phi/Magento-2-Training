<?php
namespace UnitFive\Entity\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use UnitFive\Entity\Api\Data\EntityInterface;


class Entity extends AbstractDb
{
/**
     * @inheritdoc
     */
    protected $_idFieldName = 'entity_id';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('custom_entity', EntityInterface::ENTITY_ID);
    }
}
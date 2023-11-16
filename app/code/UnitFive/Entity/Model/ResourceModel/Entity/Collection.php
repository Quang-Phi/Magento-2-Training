<?php
namespace   UnitFive\Entity\Model\ResourceModel\Entity;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use UnitFive\Entity\Model\Entity;
use UnitFive\Entity\Model\ResourceModel\Entity as EntityResourceModel;


class Collection extends AbstractCollection
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
        $this->_init(Entity::class, EntityResourceModel::class);
    }
}
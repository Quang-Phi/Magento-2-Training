<?php
namespace UnitFive\Entity\Model;

use UnitFive\Entity\Api\Data\EntityInterface;
use Magento\Framework\Model\AbstractModel;

class Entity extends AbstractModel implements EntityInterface
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
        $this->_init(ResourceModel\Entity::class);
    }

    /**
     * @inheritdoc
     */
    public function getEntityId()
    {
        return $this->_getData('entity_id');
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->_getData('name');
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return $this->_getData('description');
    }
}
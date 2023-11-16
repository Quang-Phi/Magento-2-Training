<?php
namespace UnitFive\Entity\Model;

use  UnitFive\Entity\Api\EntityRepositoryInterface;
use  UnitFive\Entity\Model\ResourceModel\Entity\Collection;

class EntityRepositoryModel implements EntityRepositoryInterface
{
    /**
     * @var Collection
     */
    private $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @inheritdoc
     */
    public function getList(): array
    {
        /** @var \UnitFive\Entity\Model\ResourceModel\Entity\Collection $collection */
        $collection = $this->collection;
        return $collection->getItems();
    }
}
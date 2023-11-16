<?php
namespace UnitFive\Entity\Api;

use UnitFive\Entity\Api\Data\EntityInterface;

interface EntityRepositoryInterface
{
    /**
     * Get a list of custom entities.
     *
     * @return \UnitFive\Entity\Api\Data\EntityInterface[]
     */
    public function getList(): array;
}
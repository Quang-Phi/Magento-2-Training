<?php
namespace UnitFive\Entity\Api\Data;

interface EntityInterface
{
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * @return int
     */
    public function getEntityId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string|null
     */
    public function getDescription();
}
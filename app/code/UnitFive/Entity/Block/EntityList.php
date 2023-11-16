<?php
namespace UnitFive\Entity\Block;

use Magento\Framework\View\Element\Template;
use UnitFive\Entity\Api\EntityRepositoryInterface;

class EntityList extends Template
{
    /**
     * @var EntityRepositoryInterface
     */
    private $customEntityRepository;

    public function __construct(
        Template\Context $context,
        EntityRepositoryInterface $customEntityRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customEntityRepository = $customEntityRepository;
    }

    /**
     * Get the custom entity list
     *
     * @return \UnitFive\Entity\Api\Data\EntityInterface[]
     */
    public function getCustomEntityList()
    {
        return $this->customEntityRepository->getList();
    }
}
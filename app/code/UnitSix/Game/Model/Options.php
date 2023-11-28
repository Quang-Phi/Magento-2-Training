<?php
namespace UnitSix\Game\Model;

use Magento\Framework\Option\ArrayInterface;
use UnitSix\Game\Model\ResourceModel\Game\GameCollectionFactory;


class Options implements ArrayInterface
{
    protected $gameCollectionFactory;

    public function __construct(GameCollectionFactory $gameCollectionFactory)
    {
        $this->gameCollectionFactory = $gameCollectionFactory;
    }

    public function toOptionArray()
    {
        $options = [];
        $collection = $this->gameCollectionFactory->create();

        foreach ($collection as $item) {
            $options[] = [
                'value' => $item->getType(), 
                'label' => $item->getType(), 
            ];
        }

        return $options;
    }
}
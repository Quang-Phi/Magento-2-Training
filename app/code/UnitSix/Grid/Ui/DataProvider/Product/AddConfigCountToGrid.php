<?php 
 
namespace UnitSix\Grid\Ui\DataProvider\Product;
  
use Magento\Framework\Data\Collection; 
use Magento\Ui\DataProvider\AddFilterToCollectionInterface; 
 
class AddConfigCountToGrid implements AddFilterToCollectionInterface 
 
{ 
 
    public function addFilter(Collection $collection, $field, $condition = null) 
 
    { 
 
        if (isset($condition['gteq'])) { 
 
            $collection->addFieldToFilter([[ 
 
                'attribute' => 'my_config_count', 'gteq' => $condition['gteq']] 
 
            ]); 
 
        } 
 
        if (isset($condition['lteq'])) { 
 
            $collection->addFieldToFilter([[ 
                'attribute' => 'my_config_count', 'lteq' => $condition['lteq']] 
 
            ]); 
 
        } 
 
    } 
 
} 
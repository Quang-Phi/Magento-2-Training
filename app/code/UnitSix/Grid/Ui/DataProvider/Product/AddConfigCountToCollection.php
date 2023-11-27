<?php 
 
namespace UnitSix\Grid\Ui\DataProvider\Product;

use Magento\Framework\Data\Collection; 
use Magento\Ui\DataProvider\AddFieldToCollectionInterface; 
 
class AddConfigCountToCollection implements AddFieldToCollectionInterface 
 
{ 
 
    public function addField(Collection $collection, $field, $alias = null) 
    { 
        $collection->joinField( 
            'my_config_count', 
            'catalog_product_entity', 
            'config_count', 
            'entity_id=entity_id',
            null, 
            'left' 
        ); 
 
    } 
 
} 

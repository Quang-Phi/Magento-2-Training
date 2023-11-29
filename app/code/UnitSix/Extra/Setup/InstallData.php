<?php
namespace UnitSix\Extra\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData  implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */

     protected $objectManager;

     public function __construct(
         \Magento\Framework\ObjectManagerInterface $objectManager
     ) {
         $this->objectManager = $objectManager;
     }
     
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Install messages
         */
        $setup->startSetup();
        $data = [
            [
               'name' => 'Extra 1',
            ],
            [
               'name' => 'Extra 2',
            ],
            [
               'name' => 'Extra 3',
            ]
		];
		
        foreach ($data as $bind) {
            $setup->getConnection()
            	->insertForce($setup->getTable('extra_table'), $bind);
        }

        $this->addExtraProductLinks($setup);
        $setup->endSetup();
    }

    protected function addExtraProductLinks($setup)
    {
        $connection = $setup->getConnection();
        $tableName = $setup->getTable('extra_product_link');
        $extraTable = $setup->getTable('extra_table');
        $productTable = $setup->getTable('catalog_product_entity');

        $productIds = $connection->fetchAll("SELECT entity_id FROM $productTable");

        foreach ($productIds as $productId) {
            $productId = $productId['entity_id'];

            $randomExtraIds = $connection->fetchAll("SELECT extra_id FROM $extraTable ORDER BY RAND() LIMIT 2");

            foreach ($randomExtraIds as $extraId) {
                $extraId = $extraId['extra_id'];

                $data = [
                    'product_id' => $productId,
                    'extra_id' => $extraId,
                ];

                $connection->insert($tableName, $data);
            }
        }
    }
}
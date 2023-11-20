<?php
namespace UnitFive\DataAPI\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
 
class InstallData  implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
     
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Install messages
         */
        $data = [
            [
                'category_id' => 1,
                'country_id' => 'US'
            ],
            [
                'category_id' => 2,
                'country_id' => 'CA'
            ]
		];
		
        foreach ($data as $bind) {
            $setup->getConnection()
            	->insertForce($setup->getTable('category_countries'), $bind);
        } 
    }
}
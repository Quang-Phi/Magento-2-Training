<?php
namespace UnitFive\DataAPI\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;


/**
 * @codeCoverageIgnore
 */
 
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
		/**
		 * Create table 'greeting_message' 
		 */
		 
        $table = $setup->getConnection()
            ->newTable($setup->getTable('category_countries'))
            ->addColumn(
                'category_country_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Category Country ID'
            )
            ->addColumn(
                'category_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Category ID'
            )
            ->addColumn(
                'country_id',
                Table::TYPE_TEXT,
                2,
                ['nullable' => false],
                'Country ID'
            )
            ->setComment('Category Countries Table');

            $setup->getConnection()->createTable($table);
    }
}

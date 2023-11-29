<?php
namespace UnitSix\Extra\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->createVendorTable($installer);
            $this->createLinkTable($installer);
        }

        $installer->endSetup();
    }

    protected function createVendorTable($installer)
    {
        $table = $installer->getConnection()->newTable(
            $installer->getTable('extra_table')
        )->addColumn(
            'extra_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Extra ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Extra Name'
        )->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
            'Creation Time'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'Modification Time'
        )->setComment(
            'Extra Table'
        );

        $installer->getConnection()->createTable($table);
    }

    protected function createLinkTable($installer)
    {
        $table = $installer->getConnection()->newTable(
            $installer->getTable('extra_product_link')
        )->addColumn(
            'link_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Link ID'
        )->addColumn(
            'product_id',
            Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => false],
            'Product ID'
        )->addColumn(
            'extra_id',
            Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => false],
            'Extra ID'
        )->addForeignKey(
            $installer->getFkName('extra_product_link', 'product_id', 'catalog_product_entity', 'entity_id'),
            'product_id',
            $installer->getTable('catalog_product_entity'),
            'entity_id',
            Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName('extra_product_link', 'extra_id', 'extra_table', 'extra_id'),
            'extra_id',
            $installer->getTable('extra_table'),
            'extra_id',
            Table::ACTION_CASCADE
        )->setComment(
            'Extra-Product Link Table'
        );

        $installer->getConnection()->createTable($table);
    }
}

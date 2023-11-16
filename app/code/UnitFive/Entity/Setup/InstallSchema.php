<?php
namespace UnitFive\Entity\Setup;

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

        $table = $installer->getConnection()
        ->newTable($installer->getTable('custom_entity'))
        ->addColumn(
            'entity_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Entity ID'
        )
        ->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Entity Name'
        )
        ->addColumn(
            'description',
            Table::TYPE_TEXT,
            '64k',
            ['nullable' => true],
            'Entity Description'
        )
        ->setComment('Custom Entity Table');

    $installer->getConnection()->createTable($table);

    $data = [
        ['name' => 'Custom 1', 'description' => 'Desc 1'],
        ['name' => 'Custom 2', 'description' => 'Desc 2'],
    ];

    $installer->getConnection()->insertMultiple($installer->getTable('custom_entity'), $data);

    $installer->endSetup();
}
}

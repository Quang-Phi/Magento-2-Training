<?php
namespace UnitSix\Game\Setup;

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

        $table = $installer->getConnection()->newTable(
            $installer->getTable('computer_games')
        )->addColumn(
            'game_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Game ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Name'
        )->addColumn(
            'type',
            Table::TYPE_TEXT,
            50,
            ['nullable' => false],
            'Type'
        ) ->addColumn(
            'trial_period',
            Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Trial Period (days)'
        )->addColumn(
            'release_date',
            Table::TYPE_DATE,
            null,
            ['nullable' => false],
            'Release Date'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}

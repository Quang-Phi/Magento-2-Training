<?php
namespace UnitSix\Grid\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Catalog\Model\ProductFactory;

class InstallData implements InstallDataInterface
{
    private $productFactory;

    public function __construct(ProductFactory $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('catalog_product_entity');

        if ($setup->getConnection()->isTableExists($tableName) == true) {
            $products = $setup->getConnection()->fetchAll("SELECT entity_id FROM $tableName");

            foreach ($products as $product) {
                $productId = $product['entity_id'];
                $configOptionsCount = $this->getNumberOfConfigurableOptions($productId);

                $data = [
                    'config_count' => $configOptionsCount
                ];

                $setup->getConnection()->update($tableName, $data, ['entity_id = ?' => $productId]);
            }
        }

        $setup->endSetup();
    }

    protected function getNumberOfConfigurableOptions($productId)
    {
        $product = $this->productFactory->create()->load($productId);
        if ($product->getTypeId() === 'configurable') {
            $configurableOptions = $product->getTypeInstance()->getConfigurableAttributes($product);
            return count($configurableOptions);
        }
        return 0;
    }
}

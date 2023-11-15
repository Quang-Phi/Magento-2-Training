<?php

namespace Training\Customer\Setup;

use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class UpgradeData implements UpgradeDataInterface
{
    private $customerSetupFactory;
    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->addPriorityAttribute($installer);
        }
        $installer->endSetup();
    }
    private function addPriorityAttribute($installer)
{
    $customerSetup = $this->customerSetupFactory->create(['setup' => $installer]);
    $customerSetup->addAttribute(
        \Magento\Customer\Model\Customer::ENTITY,
        'priority',
        [
            'type' => 'int',
            'label' => 'Priority',
            'input' => 'select',
            'source' => 'Training\Customer\Model\Customer\Attribute\Source\Priority',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'is_used_in_grid' => true,
            'is_visible_in_grid' => true,
            'is_filterable_in_grid' => true,
            'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
        ]
    );
    $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'priority')
        ->setData('used_in_forms', ['adminhtml_customer'])
        ->save();
}
}

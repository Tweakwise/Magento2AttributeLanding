<?php

namespace Tweakwise\AttributeLanding\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Tweakwise\Magento2Tweakwise\Api\Data\AttributeSlugInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        //rename old module table to new module
        if ($installer->tableExists('emico_attributelanding_page')) {
            $installer->getConnection()->dropTable('tweakwise_attributelanding_page');
            $installer->getConnection()->renameTable('emico_attributelanding_page', 'tweakwise_attributelanding_page');
        }

        if ($installer->tableExists('emico_attributelanding_overviewpage')) {
            $installer->getConnection()->dropTable('tweakwise_attributelanding_overviewpage');
            $installer->getConnection()->renameTable('emico_attributelanding_overviewpage', 'tweakwise_attributelanding_overviewpage');
        }

        $installer->endSetup();
    }
}

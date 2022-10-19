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
        /*
        if ($installer->tableExists('emico_attributelanding_page')) {
            $installer->getConnection()->dropTable('tweakwise_attributelanding_page');
            $installer->getConnection()->renameTable('emico_attributelanding_page', 'tweakwise_attributelanding_page');
        }

        if ($installer->tableExists('emico_attributelanding_overviewpage')) {
            $installer->getConnection()->dropTable('tweakwise_attributelanding_overviewpage');
            $installer->getConnection()->renameTable('emico_attributelanding_overviewpage', 'tweakwise_attributelanding_overviewpage');
        }

        $installer->getConnection()->query('update core_config_data SET path = "tweakwise_attributelanding/general/allow_crosslink" WHERE path = "emico_attributelanding/general/allow_crosslink"');
        $installer->getConnection()->query('update core_config_data SET path = "tweakwise_attributelanding/general/append_category_url_suffix" WHERE path = "emico_attributelanding/general/append_category_url_suffix"');
        $installer->getConnection()->query('update core_config_data SET path = "tweakwise_attributelanding/general/canonical_self_referencing" WHERE path = "emico_attributelanding/general/canonical_self_referencing"');
        $installer->getConnection()->query('UPDATE url_rewrite SET target_path =  REPLACE( target_path, "emico_attributelanding", "tweakwise_attributelanding") where target_path LIKE "emico_attributelanding%"');
        */
        $installer->endSetup();
    }
}

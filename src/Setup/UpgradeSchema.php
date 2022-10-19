<?php

namespace Tweakwise\AttributeLanding\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
    * {@inheritdoc}
    */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        //rename old module table to new module
        if ($installer->tableExists('tweakwise_attributelanding_page')) {
            $installer->getConnection()->dropTable('emico_attributelanding_page');
            $installer->getConnection()->renameTable('tweakwise_attributelanding_page', 'emico_attributelanding_page');
        }

        if ($installer->tableExists('tweakwise_attributelanding_overviewpage')) {
            $installer->getConnection()->dropTable('emico_attributelanding_overviewpage');
            $installer->getConnection()->renameTable('tweakwise_attributelanding_overviewpage', 'emico_attributelanding_overviewpage');
        }

        $installer->getConnection()->query('update core_config_data SET path = "emico_attributelanding/general/allow_crosslink" WHERE path = "tweakwise_attributelanding/general/allow_crosslink"');
        $installer->getConnection()->query('update core_config_data SET path = "emico_attributelanding/general/append_category_url_suffix" WHERE path = "tweakwise_attributelanding/general/append_category_url_suffix"');
        $installer->getConnection()->query('update core_config_data SET path = "emico_attributelanding/general/canonical_self_referencing" WHERE path = "tweakwise_attributelanding/general/canonical_self_referencing"');
        $installer->getConnection()->query('UPDATE url_rewrite SET target_path =  REPLACE( target_path, "tweakwise_attributelanding", "emico_attributelanding") where target_path LIKE "emico_attributelanding%"');

        $installer->endSetup();
    }
}

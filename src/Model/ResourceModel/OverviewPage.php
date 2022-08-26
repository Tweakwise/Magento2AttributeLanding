<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2019
 */


namespace Tweakwise\AttributeLanding\Model\ResourceModel;

use Tweakwise\AttributeLanding\Api\Data\LandingPageInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class OverviewPage extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('tweakwise_attributelanding_overviewpage', LandingPageInterface::PAGE_ID);
    }

}

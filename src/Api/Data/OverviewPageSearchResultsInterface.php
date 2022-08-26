<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2019
 */

namespace Tweakwise\AttributeLanding\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface OverviewPageSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Page list.
     * @return \Tweakwise\AttributeLanding\Api\Data\OverviewPageInterface[]
     */
    public function getItems(): array;
}

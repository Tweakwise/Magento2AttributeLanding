<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2019
 */

namespace Tweakwise\AttributeLanding\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface PageSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Page list.
     * @return \Tweakwise\AttributeLanding\Api\Data\LandingPageInterface[]
     */
    public function getItems(): array;
}

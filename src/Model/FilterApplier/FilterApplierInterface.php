<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2019
 */

namespace Tweakwise\AttributeLanding\Model\FilterApplier;

use Tweakwise\AttributeLanding\Api\Data\LandingPageInterface;

interface FilterApplierInterface
{
    /**
     * @param LandingPageInterface $page
     * @return mixed
     */
    public function applyFilters(LandingPageInterface $page);

    /**
     * @return bool
     */
    public function canApplyFilters(): bool;
}

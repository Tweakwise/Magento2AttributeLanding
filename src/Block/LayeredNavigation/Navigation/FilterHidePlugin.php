<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2019
 */

namespace Tweakwise\AttributeLanding\Block\LayeredNavigation\Navigation;


use Tweakwise\AttributeLanding\Model\FilterHider\FilterHiderInterface;
use Tweakwise\AttributeLanding\Model\LandingPageContext;
use Magento\LayeredNavigation\Block\Navigation;

/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2019
 */

class FilterHidePlugin
{
    /**
     * @var FilterHiderInterface
     */
    private $filterHider;

    /**
     * @var LandingPageContext
     */
    private $landingPageContext;

    /**
     * Plugin constructor.
     * @param LandingPageContext $landingPageContext
     * @param FilterHiderInterface $filterHider
     */
    public function __construct(LandingPageContext $landingPageContext, FilterHiderInterface $filterHider)
    {
        $this->filterHider = $filterHider;
        $this->landingPageContext = $landingPageContext;
    }

    /**
     * @param Navigation $subject
     * @param $filters
     * @return mixed
     */
    public function afterGetFilters(Navigation $subject, array $filters)
    {
        $landingPage = $this->landingPageContext->getLandingPage();
        if (!$landingPage || !$landingPage->getHideSelectedFilters()) {
            return $filters;
        }

        foreach ($filters as $index => $filter) {
            if ($this->filterHider->shouldHideFilter($landingPage, $filter)) {
                unset($filters[$index]);
            }
        }

        return $filters;
    }
}

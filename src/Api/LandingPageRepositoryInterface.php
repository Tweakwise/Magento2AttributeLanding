<?php


namespace Tweakwise\AttributeLanding\Api;

use Tweakwise\AttributeLanding\Api\Data\OverviewPageInterface;
use Tweakwise\AttributeLanding\Api\Data\LandingPageInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;

interface LandingPageRepositoryInterface
{
    /**
     * Save Page
     * @param \Tweakwise\AttributeLanding\Api\Data\LandingPageInterface $page
     * @return \Tweakwise\AttributeLanding\Api\Data\LandingPageInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(LandingPageInterface $page): LandingPageInterface;

    /**
     * Retrieve Page
     * @param int $pageId
     * @return \Tweakwise\AttributeLanding\Api\Data\LandingPageInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws NoSuchEntityException
     */
    public function getById(int $pageId): LandingPageInterface;

    /**
     * Retrieve Page matching the specified criteria.
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Tweakwise\AttributeLanding\Api\Data\PageSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Page
     * @param \Tweakwise\AttributeLanding\Api\Data\LandingPageInterface $page
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(LandingPageInterface $page): bool;

    /**
     * Delete Page by ID
     * @param int $pageId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(int $pageId): bool;

    /**
     * @return LandingPageInterface[]
     */
    public function findAllActive(): array;

    /**
     * @param OverviewPageInterface $overviewPage
     * @return LandingPageInterface[]
     */
    public function findAllByOverviewPage(OverviewPageInterface $overviewPage): array;
}

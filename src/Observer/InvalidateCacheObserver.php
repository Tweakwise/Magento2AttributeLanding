<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2019
 */

namespace Tweakwise\AttributeLanding\Observer;


use Tweakwise\AttributeLanding\Api\Data\LandingPageInterface;
use Tweakwise\AttributeLanding\Model\UrlFinder;
use Magento\Framework\App\CacheInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class InvalidateCacheObserver implements ObserverInterface
{
    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * InvalidateCacheObserver constructor.
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param Observer $observer
     * @return void
     * @throws \Exception
     */
    public function execute(Observer $observer)
    {
        $page = $observer->getEvent()->getData('object');
        if (!$page instanceof LandingPageInterface) {
            return;
        }

        $this->cache->remove(UrlFinder::CACHE_KEY);
    }
}

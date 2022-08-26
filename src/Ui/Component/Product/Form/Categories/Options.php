<?php
namespace Tweakwise\AttributeLanding\Ui\Component\Product\Form\Categories;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Catalog\Model\Category as CategoryModel;

/**
 * Options tree for "Categories" field
 */
class Options extends \Magento\Catalog\Ui\Component\Product\Form\Categories\Options implements OptionSourceInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory
     */
    protected $categoryCollectionFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var array
     */
    protected $categoriesTree;

    /**
     * @param CategoryCollectionFactory $categoryCollectionFactory
     * @param RequestInterface $request
     */
    public function __construct(
        CategoryCollectionFactory $categoryCollectionFactory,
        RequestInterface $request
    ) {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        $this->request = $request;
    }

    /**
     * Retrieve categories tree
     *
     * @return array
     */
    protected function getCategoriesTree()
    {
        if ($this->categoriesTree === null) {
            $this->categoriesTree = parent::getCategoriesTree();

            $categoriesWithoutRoot = [];

            //remove root category and add root category label
            foreach ($this->categoriesTree as $rootCategory) {
                foreach($rootCategory['optgroup'] as &$subCategory) {
                    $subCategory['label'] .= ' ('.$rootCategory['label'].')';
                }
                if (isset( $rootCategory['optgroup'])) {
                    $categoriesWithoutRoot = array_merge($categoriesWithoutRoot, $rootCategory['optgroup']);
                }
            }

            $this->categoriesTree = $categoriesWithoutRoot;
        }

        return $this->categoriesTree;
    }
}

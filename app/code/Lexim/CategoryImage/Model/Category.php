<?php
/**
 * Catalog category model
 * @author Samuel Kong
 */

namespace Lexim\CategoryImage\Model;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Category extends \Magento\Catalog\Model\ResourceModel\Category
{

    /**
     * Category constructor.
     * @param \Magento\Eav\Model\Entity\Context $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Catalog\Model\Factory $modelFactory
     * @param \Magento\Framework\Event\ManagerInterface $eventManager
     * @param \Magento\Catalog\Model\ResourceModel\Category\TreeFactory $categoryTreeFactory
     * @param \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Eav\Model\Entity\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\Factory $modelFactory,
        \Magento\Framework\Event\ManagerInterface $eventManager,
        \Magento\Catalog\Model\ResourceModel\Category\TreeFactory $categoryTreeFactory,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        $data = []
    ) {
        parent::__construct(
            $context,
            $storeManager,
            $modelFactory,
            $eventManager,
            $categoryTreeFactory,
            $categoryCollectionFactory,
            $data
        );
    }    

        
    /**
     * Return child categories
     *
     * @param \Magento\Catalog\Model\Category $category
     * @return \Magento\Catalog\Model\ResourceModel\Category\Collection
     */
    public function getChildrenCategories($category)
    {
        $collection = $category->getCollection();
        /* @var $collection \Magento\Catalog\Model\ResourceModel\Category\Collection */
        $collection->addAttributeToSelect(
            'url_key'
        )->addAttributeToSelect(
            'name'
        )->addAttributeToSelect(
            'all_children'
        )->addAttributeToSelect(
            'image'
        )->addAttributeToSelect(
            'is_anchor'
        )->addAttributeToFilter(
            'is_active',
            1
        )->addIdFilter(
            $category->getChildren()
        )->setOrder(
            'position',
            \Magento\Framework\DB\Select::SQL_ASC
        )->joinUrlRewrite()->load();

        return $collection;
    }    


}

<?php
/**
 * Copyright © 2016 Ihor Vansach (ihor@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 *
 * Glory to Ukraine! Glory to the heroes!
 */

namespace Magefan\Blog\Block\Category;

use Magento\Store\Model\ScopeInterface;

/**
 * Blog category view
 */
class View extends \Magefan\Blog\Block\Post\PostList
{
    /**
     * Prepare posts collection
     *
     * @return void
     */
    protected function _preparePostCollection()
    {
        parent::_preparePostCollection();
        if ($category = $this->getCategory()) {
            $categories = $category->getChildrenIds();
            $categories[] = $category->getId();
            $this->_postCollection->addCategoryFilter($categories);
        }
    }

    /**
     * Retrieve category instance
     *
     * @return \Magefan\Blog\Model\Category
     */
    public function getCategory()
    {
        return $this->_coreRegistry->registry('current_blog_category');
    }

    /**
     * Preparing global layout
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        $category = $this->getCategory();
        $this->_addBreadcrumbs($category);
        $this->pageConfig->addBodyClass('blog-category-' . $category->getIdentifier());
        $this->pageConfig->getTitle()->set($category->getTitle());
        $this->pageConfig->setKeywords($category->getMetaKeywords());
        $this->pageConfig->setDescription($category->getMetaDescription());

        return parent::_prepareLayout();
    }

    /**
     * Prepare breadcrumbs
     *
     * @param \Magefan\Blog\Model\Category $category
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return void
     */
    protected function _addBreadcrumbs($category)
    {
        if ($this->_scopeConfig->getValue('web/default/show_cms_breadcrumbs', ScopeInterface::SCOPE_STORE)
            && ($breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs'))
        ) {
            $breadcrumbsBlock->addCrumb(
                'home',
                [
                    'label' => __('Home'),
                    'title' => __('Go to Home Page'),
                    'link' => $this->_storeManager->getStore()->getBaseUrl()
                ]
            );

            $breadcrumbsBlock->addCrumb(
                'blog',
                [
                    'label' => __('Blog'),
                    'title' => __('Go to Blog Home Page'),
                    'link' => $this->_url->getBaseUrl()
                ]
            );

            $_category = $category;
            $parentCategories = [];
            while ($parentCategory = $_category->getParentCategory(true)) {
                $parentCategories[] = $_category = $parentCategory;
            }

            for ($i = count($parentCategories) - 1; $i >= 0; $i--) {
                $_category = $parentCategories[$i];
                $breadcrumbsBlock->addCrumb('blog_parent_category_' . $_category->getId(), [
                    'label' => $_category->getTitle(),
                    'title' => $_category->getTitle(),
                    'link' => $_category->getCategoryUrl()
                ]);
            }

            $breadcrumbsBlock->addCrumb('blog_category', [
                'label' => $category->getTitle(),
                'title' => $category->getTitle()
            ]);
        }
    }

    /**
     * Get Posts by Url category
     * @param $urlKey
     * @return mixed
     */
    public function getPostsByUrlCat($urlKey)
    {
        $_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $cat = $_objectManager->create('Magefan\Blog\Model\Category')->load($urlKey);

        $ar = $_objectManager->create('Magefan\Blog\Model\ResourceModel\Post\Collection');
        $ar->addActiveFilter()->addCategoryFilter($cat);
        return $ar;
    }

}
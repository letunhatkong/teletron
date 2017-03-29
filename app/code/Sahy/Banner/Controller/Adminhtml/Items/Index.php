<?php

namespace Sahy\Banner\Controller\Adminhtml\Items;

class Index extends \Sahy\Banner\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Sahy_Banner::banner');
        $resultPage->getConfig()->getTitle()->prepend(__('Home Banner CMS'));
        $resultPage->addBreadcrumb(__('Banners'), __('Banners'));
        $resultPage->addBreadcrumb(__('Items'), __('Items'));
        return $resultPage;
    }
}

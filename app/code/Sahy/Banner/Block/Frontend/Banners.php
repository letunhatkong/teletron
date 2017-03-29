<?php
namespace Sahy\Banner\Block\Frontend;

class Banners extends \Magento\Framework\View\Element\Template
{

    const TYPE_SUB_BANNER1 = 'subBanner1';
    const TYPE_SUB_BANNER2 = 'subBanner2';

    protected $_imageCollection = null;

    /**
     * Page factory
     *
     * @var \Magento\Cms\Model\PageFactory
     */
    protected $_imageCollectionFactory;

    /**
     * Banners constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Sahy\Banner\Model\ItemsFactory $imageCollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Sahy\Banner\Model\ItemsFactory $imageCollectionFactory,
        array $data = [] )
    {
        $this->_imageCollectionFactory = $imageCollectionFactory;
        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * Get All Banner
     * @return array
     */
    public function getAllBanner()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()
            ->addFieldToFilter('image', array('notnull' => true));
        $dd = $iCollection->getData();

        return $dd;
    }

    /**
     * Get All Banner by type
     * @param $type
     * @return array
     */
    public function getAllBannerByType($type)
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()
            ->addFieldToFilter('image', array('notnull' => true))
            ->addFieldToFilter('layout', $type);
        $dd = $iCollection->getData();

        return $dd;
    }

    public function getHomeLeftCollection()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()->addFieldToFilter('layout', 'left')->addFieldToFilter('pages', 'home page');
        $dd = $iCollection->getData();

        return $dd;
    }

    public function getHomeContentCollection()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()->addFieldToFilter('layout', 'top content')->addFieldToFilter('pages', 'home page');
        $dd = $iCollection->getData();

        return $dd;
    }

    public function getHomeBottomContentCollection()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()->addFieldToFilter('layout', 'bottom content')->addFieldToFilter('pages', 'home page');
        $dd = $iCollection->getData();

        return $dd;
    }


    public function getCategoryLeftCollection()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()->addFieldToFilter('layout', 'left')->addFieldToFilter('pages', 'Category Page');
        $dd = $iCollection->getData();

        return $dd;
    }

    public function getCategoryTopCollection()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()->addFieldToFilter('layout', 'top content')->addFieldToFilter('pages', 'Category Page');
        $dd = $iCollection->getData();
        return $dd;
    }

    public function getCategoryBottomCollection()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()->addFieldToFilter('layout', 'bottom content')->addFieldToFilter('pages', 'Category Page');
        $dd = $iCollection->getData();

        return $dd;
    }

    public function getProductLeftCollection()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()->addFieldToFilter('layout', 'left')->addFieldToFilter('pages', 'Product Detail Page');
        $dd = $iCollection->getData();

        return $dd;
    }

    public function getProductTopCollection()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()->addFieldToFilter('layout', 'top content')->addFieldToFilter('pages', 'Product Detail Page');
        $dd = $iCollection->getData();

        return $dd;
    }

    public function getProductBottomCollection()
    {
        $collection = $this->_imageCollectionFactory->create();
        $iCollection = $collection->getCollection()->addFieldToFilter('layout', 'bottom content')->addFieldToFilter('pages', 'Product Detail Page');
        $dd = $iCollection->getData();

        return $dd;
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }


}
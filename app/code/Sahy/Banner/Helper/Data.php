<?php

namespace Sahy\Banner\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class Data extends AbstractHelper
{
    const XML_PATH_ENABLED = 'yes';
    const XML_PATH_HEAD_TITLE = 'Home Banner CMS';


    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;
    protected $httpFactory;
    protected $filesystem;


    /**
     * Data constructor.
     * @param Context $context
     * @param \Magento\Framework\HTTP\Adapter\FileTransferFactory $httpFactory
     * @param \Magento\Framework\Filesystem $filesystem
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        \Magento\Framework\HTTP\Adapter\FileTransferFactory $httpFactory,
        \Magento\Framework\Filesystem $filesystem,
        ScopeConfigInterface $scopeConfig
    )
    {
        parent::__construct($context);
        $this->httpFactory = $httpFactory;
        $this->filesystem = $filesystem;
        $this->_scopeConfig = $scopeConfig;
    }


    /**
     * Get head title for news list page
     *
     * @return string
     */
    public function getHeadTitle()
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_HEAD_TITLE,
            ScopeInterface::SCOPE_STORE
        );
    }

    public function getBaseDir()
    {
        $path = $this->filesystem->getDirectoryRead(
            DirectoryList::MEDIA
        )->getAbsolutePath('banners');
        return $path;
    }

}
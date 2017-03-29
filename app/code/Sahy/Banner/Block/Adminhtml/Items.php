<?php

namespace Sahy\Banner\Block\Adminhtml;

class Items extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'Home Banner';
        $this->_headerText = __('Home Banner');
        $this->_addButtonLabel = __('Add New Banner');
        parent::_construct();
    }
}

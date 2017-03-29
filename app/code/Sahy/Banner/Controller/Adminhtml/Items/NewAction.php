<?php

namespace Sahy\Banner\Controller\Adminhtml\Items;

class NewAction extends \Sahy\Banner\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}

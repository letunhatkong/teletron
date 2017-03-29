<?php

namespace Sahy\Banner\Model\Resource\Items;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Sahy\Banner\Model\Items', 'Sahy\Banner\Model\Resource\Items');
    }
}

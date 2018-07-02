<?php

namespace Smart\Osc\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Smart\Osc\Model\Post', 'Smart\Osc\Model\ResourceModel\Post');
    }

}
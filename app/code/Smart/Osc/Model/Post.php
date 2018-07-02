<?php
namespace Smart\Osc\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'smart_osc_post';

    protected $_cacheTag = 'smart_osc_post';

    protected $_eventPrefix = 'smart_osc_post';

    protected function _construct()
    {
        $this->_init('Smart\Osc\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
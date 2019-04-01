<?php
namespace Manager\Employee\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'manager_employee_post';

    protected $_cacheTag = 'manager_employee_post';

    protected $_eventPrefix = 'manager_employee_post';

    protected function _construct()
    {
        $this->_init('Manager\Employee\Model\ResourceModel\Post');
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

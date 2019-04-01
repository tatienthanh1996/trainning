<?php
namespace Manager\Employee\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'manager_employee_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Manager\Employee\Model\Post', 'Manager\Employee\Model\ResourceModel\Post');
    }

}

<?php
namespace Quanly\Nhanvien\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'nv_id';
    protected $_eventPrefix = 'quanly_nhanvien_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Quanly\Nhanvien\Model\Post', 'Quanly\Nhanvien\Model\ResourceModel\Post');
    }

}
